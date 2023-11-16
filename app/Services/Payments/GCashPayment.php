<?php

namespace App\Services\Payments;

use App\Services\PaymentInterface;

class GCashPayment implements PaymentInterface
{
    public $orders;

    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    public function pay()
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://pg-sandbox.paymaya.com/checkout/v1/checkouts', [
            'body' => json_encode([
                'totalAmount' => [
                    'value' => $this->orders->total_amount,
                    'currency' => 'PHP'
                ],
                'redirectUrl' => [
                    'success' => route('cart.payment.success', ['order' => $this->orders->id]), 
                    'failure' => route('cart.payment.failed'),
                    'fail' => redirect()->back()
                ],
                'requestReferenceNumber' => '345678ugcv'
            ]),
            'headers' => [
                'accept' => 'application/json',
                'authorization' => 'Basic cGstWjBPU3pMdkljT0kyVUl2RGhkVEdWVmZSU1NlaUdTdG5jZXF3VUU3bjBBaDo=',
                'content-type' => 'application/json',
            ],
        ]);

        return json_decode($response->getBody());;
    }
}