<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Console;
use Illuminate\Database\QueryException;
use Midtrans\Config;
use Midtrans\Snap;
use App\Http\Controllers\Controller; 

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
        // Cek konfigurasi MIDTRANS
        if (empty(config('midtrans.serverKey')) || empty(config('midtrans.clientKey'))) {
            return response()->json([
                'ok' => false,
                'message' => 'MIDTRANS belum dikonfigurasi.',
            ], 500);
        }

        // Validasi input
        $data = $request->validate([
            'console_id' => 'required|integer',
            'duration'   => 'required|integer|min:1|max:12',
        ]);

        // Ambil data konsol
        $consoles = collect($this->getConsoles())->keyBy('id');

        if (!$consoles->has($data['console_id'])) {
            return response()->json(['ok' => false, 'message' => 'Konsol tidak ditemukan.'], 404);
        }

        $console = $consoles[$data['console_id']];

        if (($console['status'] ?? 'available') !== 'available') {
            return response()->json(['ok' => false, 'message' => 'Konsol sedang disewa.'], 422);
        }

        // Hitung harga
        $hourly  = (int) $console['hourly_rate'];
        $duration = (int) $data['duration'];
        $grossAmount = $hourly * $duration;

        // Setup MIDTRANS
        Config::$serverKey    = config('midtrans.serverKey');
        Config::$clientKey    = config('midtrans.clientKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized  = true;
        Config::$is3ds        = true;

        // Parameter transaksi
        $params = [
            'transaction_details' => [
                'order_id'     => 'order-' . uniqid(),
                'gross_amount' => $grossAmount,
            ],
            'item_details' => [
                [
                    'id'       => (string) $console['id'],
                    'price'    => $hourly,
                    'quantity' => $duration,
                    'name'     => $console['type'] . ' ' . $console['name'],
                ],
            ],
            'customer_details' => [
                'first_name' => 'User',
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            return response()->json([
                'ok' => true,
                'token' => $snapToken,
                'gross_amount' => $grossAmount,
            ]);

     } catch (\Exception $e) {

    \Log::error("MIDTRANS ERROR: " . $e->getMessage());

    return response()->json([
        'ok' => false,
        'message' => 'Gagal membuat token.',
        'error'   => $e->getMessage(),
    ], 500);
}
    }
}