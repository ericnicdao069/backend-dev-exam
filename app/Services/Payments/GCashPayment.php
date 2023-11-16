<?php

namespace App\Services\Payments;

class GCashPayment implements PaymentInterface
{
    public function pay()
    {
        $paymongo = new PayMongoService();

    }
}