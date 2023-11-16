<?php

namespace App\Services;

use App\Services\PaymentFactory;

class PaymentService
{
    public static function startPaymentProcess($request, $order)
    {
        $paymentFactory = new PaymentFactory($request, $order);
        $paymentIntent = $paymentFactory->initializePayment();

        return $paymentIntent->pay();
    }
}