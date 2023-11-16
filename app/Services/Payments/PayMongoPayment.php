<?php

namespace App\Services\Payments;

use App\Services\PaymentInterface;
use Luigel\Paymongo\Facades\Paymongo;

class PayMongoPayment implements PaymentInterface
{
    public $orders;

    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    public function pay()
    {
        $payment = Paymongo::source()->create([
            'type' => 'gcash',
            'amount' => $this->orders->total_amount,
            'currency' => 'PHP',
            'redirect' => [
                'success' => route('cart.payment.success', ['order' => $this->orders->id]),
                'failed' => route('cart.payment.failed')
            ]
        ]);

        return (object)[
            'reference' => $payment->id,
            'redirect' => $payment->redirect['checkout_url']
        ];
    }
}