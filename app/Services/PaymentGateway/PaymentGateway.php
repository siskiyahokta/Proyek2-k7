<?php

namespace App\Services\PaymentGateway;

interface PaymentGateway
{
    public function createTransactionToken(array $payload): string;
}
