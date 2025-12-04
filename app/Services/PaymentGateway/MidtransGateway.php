<?php

namespace App\Services\PaymentGateway;

use Midtrans\Config;
use Midtrans\Snap;

class MidtransGateway implements PaymentGateway
{
    public function __construct()
    {
        Config::$serverKey    = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized  = true;
        Config::$is3ds        = true;
    }

    public function createTransactionToken(array $payload): string
    {
        $params = [
            'transaction_details' => [
                'order_id'     => $payload['order_id'],
                'gross_amount' => $payload['gross_amount'],
            ],
            'item_details' => [
                [
                    'id'       => (string) $payload['console_id'],
                    'price'    => $payload['hourly_rate'],
                    'quantity' => $payload['duration_hours'],
                    'name'     => $payload['console_label'],
                ],
            ],
            'customer_details' => [
                'first_name' => $payload['customer_name'] ?? 'User',
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}
