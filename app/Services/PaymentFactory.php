<?php

namespace App\Services;

use App\Services\Payments\GCashPayment;
use App\Services\Payments\GrabPayPayment;

class PaymentFactory
{
    public $request;
    public $order;

    public function __construct($request, $order) {
        $this->request = $request;
        $this->order = $order;
    }

    public function initializePayment()
    {
        switch ($this->request->payment_method)
        {
            case "gcash":
                return new GCashPayment($this->order); break;
            case "grabpay":
                return new GrabPayPayment(); break;
            default:
                throw new \Exception("Payment Method not supported");
        }
    }
}