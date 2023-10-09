<?php

namespace App\Services;

use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use App\Enums\PaymentStatus;
use Luigel\Paymongo\Facades\Paymongo;

class PaymongoService
{
    protected $order;
    protected $type;
    private $paymentMethodID;

    /**
     * @param \App\Models\Order $order
     * @param string $type
     */
    public function __construct($order, $type)
    {
        $this->order = $order;
        $this->type = $type;
    }

    /**
     * @param array $data
     * @return \PaymentMethod
     */
    public function createPaymentMethod($data)
    {
        $payload = [
            'type' => $this->type,
            'billing' => [
                'address' => [
                    'line1' => $this->order->address_line1,
                    'city' => $this->order->city,
                    'state' => $this->order->address_line2,
                    'country' => $this->order->country,
                    'postal_code' => $this->order->postcode,
                ],
                'name' => $this->order->fullname,
                'email' => $this->order->email,
                'phone' => $this->order->contact
            ]
        ];

        if ($this->type == PaymentMethod::CARD->value) {
            $expiry = explode("/", $data['card_expiry']); // MM/YY

            $payload['details'] = [
                'card_number' => preg_replace('/\s+/', '', $data['card_number']),
                'exp_month' => (int) $expiry[0],
                'exp_year' => (int) $expiry[1],
                'cvc' => $data['card_cvc'],
            ];
        }

        $paymentMethod = Paymongo::paymentMethod()->create($payload);

        return $paymentMethod;
    }
}