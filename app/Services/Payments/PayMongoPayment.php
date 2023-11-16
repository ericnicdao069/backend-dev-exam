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
        $this->createSource();
    }

    protected function createSource()
    {
        return Paymongo::source()->create([
            'type' => 'gcash',
            'amount' => $this->orders->total_amount,
            'currency' => 'PHP',
            'redirect' => [
                'success' => route('cart.payment.success', ['order' => $this->orders->id]),
                'failed' => route('cart.payment.failed')
            ]
        ]);
    }
}