<?php

namespace App\Services;

use App\Services\Payments\PayMayaPayment;
use App\Services\Payments\PayMongoPayment;

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
            case "paymaya":
                return new PayMayaPayment($this->order); break;
            case "paymongo":
                return new PayMongoPayment($this->order); break;
            default:
                throw new \Exception("Payment Method not supported");
        }
    }
}