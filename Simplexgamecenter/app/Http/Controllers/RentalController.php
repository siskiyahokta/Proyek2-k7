<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Console;
use Illuminate\Database\QueryException;

class RentalController extends Controller
{
    public function index()
    {
        try {
            $consoles = Console::orderBy('type')->orderBy('name')->get()
                ->map(function ($c) {
                    return [
                        'id' => $c->id,
                        'name' => $c->name,
                        'type' => $c->type,
                        'status' => $c->status,
                        'hourly_rate' => (int) $c->hourly_rate,
                        'rented_until' => $c->rented_until ? $c->rented_until->toIso8601String() : null,
                    ];
                })
                ->toArray();

            return view('rental', compact('consoles'));
        } catch (QueryException $e) {
            return view('errors.missing-tables', [
                'table' => 'consoles',
                'exception' => $e,
            ]);
        }
    }

    private function getConsoles(): array
    {
        return Console::all()->map(function ($c) {
            return [
                'id' => $c->id,
                'name' => $c->name,
                'type' => $c->type,
                'status' => $c->status,
                'hourly_rate' => (int) $c->hourly_rate,
                'rented_until' => $c->rented_until ? $c->rented_until->toIso8601String() : null,
            ];
        })->keyBy('id')->toArray();
    }

    public function paymentToken(Request $request)
    {
        $data = $request->validate([
            'console_id' => 'required|integer',
            'duration'   => 'required|integer|min:1|max:12',
        ]);

        $consoles = collect($this->getConsoles())->keyBy('id');
        if (!$consoles->has($data['console_id'])) {
            return response()->json(['ok' => false, 'message' => 'Konsol tidak ditemukan.'], 404);
        }

        $console = $consoles[$data['console_id']];
        if (($console['status'] ?? 'available') !== 'available') {
            return response()->json(['ok' => false, 'message' => 'Konsol sedang disewa.'], 422);
        }

        $hourly = (int) ($console['hourly_rate'] ?? 0);
        $duration = (int) $data['duration'];
        $grossAmount = $hourly * $duration;

        $serverKey = env('MIDTRANS_SERVER_KEY');
        $clientKey = env('MIDTRANS_CLIENT_KEY');
        $isProduction = (bool) env('MIDTRANS_IS_PRODUCTION', false);

        if ($serverKey && $clientKey) {
            $baseUrl = $isProduction
                ? 'https://app.midtrans.com/snap/v1/transactions'
                : 'https://app.sandbox.midtrans.com/snap/v1/transactions';

            $orderId = 'order-' . uniqid();
            $payload = [
                'transaction_details' => [
                    'order_id'      => $orderId,
                    'gross_amount'  => $grossAmount,
                ],
                'item_details' => [[
                    'id'       => (string) $console['id'],
                    'price'    => $hourly,
                    'quantity' => $duration,
                    'name'     => $console['type'] . ' ' . $console['name'],
                ]],
                'credit_card' => [
                    'secure' => true,
                ],
            ];

            $ch = curl_init($baseUrl);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST           => true,
                CURLOPT_HTTPHEADER     => [
                    'Content-Type: application/json',
                    'Accept: application/json',
                    'Authorization: Basic ' . base64_encode($serverKey . ':'),
                ],
                CURLOPT_POSTFIELDS     => json_encode($payload),
                CURLOPT_TIMEOUT        => 20,
            ]);
            $resp = curl_exec($ch);
            $err  = curl_error($ch);
            $code = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
            curl_close($ch);

            if ($err) {
                return response()->json([
                    'ok' => false,
                    'message' => 'Gagal menghubungi Midtrans: ' . $err,
                ], 500);
            }

            $json = json_decode($resp, true);
            if ($code >= 200 && $code < 300 && isset($json['token'])) {
                return response()->json([
                    'ok' => true,
                    'mode' => $isProduction ? 'production' : 'sandbox',
                    'token' => $json['token'],
                    'order_id' => $orderId,
                    'gross_amount' => $grossAmount,
                ]);
            }

            return response()->json([
                'ok' => false,
                'message' => 'Gagal mendapatkan token pembayaran.',
                'detail' => $json,
            ], 500);
        }

        return response()->json([
            'ok' => true,
            'mode' => 'mock',
            'token' => 'mock-token-' . uniqid(),
            'order_id' => 'order-' . uniqid(),
            'gross_amount' => $grossAmount,
            'note' => 'MIDTRANS_SERVER_KEY/CLIENT_KEY belum diset; ini token mock.',
        ]);
    }
}
