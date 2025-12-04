<?php

namespace App\Http\Controllers;

use App\Http\Requests\Rental\CreatePaymentTokenRequest;
use App\Models\Console;
use App\Services\PaymentGateway\PaymentGateway;
use App\Services\RentalService;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class RentalController extends Controller
{
    public function __construct(
        private readonly RentalService $rentalService,
        private readonly PaymentGateway $paymentGateway
    ) {}

    public function index(): View
    {
        try {
            $consoles = Console::orderBy('type')
                ->orderBy('name')
                ->get()
                ->map(function (Console $c): array {
                    return [
                        'id'           => $c->id,
                        'name'         => $c->name,
                        'type'         => $c->type,
                        'status'       => $c->status,
                        'hourly_rate'  => (int) $c->hourly_rate,
                        'rented_until' => $c->rented_until?->toIso8601String(),
                    ];
                })
                ->toArray();

            return view('rental', compact('consoles'));
        } catch (QueryException $e) {
            return view('errors.missing-tables', [
                'table'     => 'consoles',
                'exception' => $e,
            ]);
        }
    }

    public function paymentToken(CreatePaymentTokenRequest $request): JsonResponse
    {
        $data = $request->validated();

        $console = Console::findOrFail($data['console_id']);

        if ($console->status !== 'available') {
            return response()->json([
                'ok'      => false,
                'message' => 'Konsol sedang disewa.',
            ], 422);
        }

        $rental = $this->rentalService->createRental(
            $console,
            $data['duration'],
            $request->user()?->id
        );

        $payload = [
            'order_id'       => $rental->order_id,
            'gross_amount'   => $rental->total_price,
            'console_id'     => $console->id,
            'hourly_rate'    => $console->hourly_rate,
            'duration_hours' => $rental->duration_hours,
            'console_label'  => $console->type . ' ' . $console->name,
            'customer_name'  => $request->user()?->name,
        ];

        try {
            $token = $this->paymentGateway->createTransactionToken($payload);

            return response()->json([
                'ok'           => true,
                'token'        => $token,
                'gross_amount' => $rental->total_price,
            ]);
        } catch (\Throwable $e) {
            \Log::error('MIDTRANS ERROR: ' . $e->getMessage(), [
                'exception' => $e,
            ]);

            return response()->json([
                'ok'      => false,
                'message' => 'Gagal membuat token.',
            ], 500);
        }
    }
}
