<?php

namespace App\Enums;

enum PaymentMethod : int
{
    case CARD = 1;
    case GCASH = 2;
    case PAYMAYA = 3;
    case GRABPAY = 4;
    case OTC = 5;

    /**
     * Shows the proper label after casting
     */
    public function label() : string
    {
        return match($this)
        {
            self::CARD => 'Credit/Debit Card',
            self::GCASH => 'GCash',
            self::PAYMAYA => 'PayMaya',
            self::GRABPAY => 'GrabPay',
            self::OTC => 'Over the Counter',
        };
    }

    /**
     * Populate select options for categories
     * 
     * @return array
     */
    static function getOptions() {
        $items = [];

        foreach (self::cases() as $case) {
            $items[$case->value] = $case->label();
        }

        return $items;
    }

    /**
     * Get options for e-wallet payments
     * 
     * @return array
     */
    static function getEwalletOptions() {
        return [
            self::GCASH->name => self::GCASH->value,
            self::PAYMAYA->name => self::PAYMAYA->value,
            self::GRABPAY->name => self::GRABPAY->value
        ];
    }

    /**
     * Get options for bank payments
     * 
     * @return array
     */
    static function getBankOptions() {
        return [
            self::CARD->name => self::CARD->value,
            self::OTC->name => self::OTC->value
        ];
    }
}