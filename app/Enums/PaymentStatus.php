<?php

namespace App\Enums;

enum PaymentStatus : int
{
    case PENDING = 1;
    case SUCCESS = 2;
    case FAILED = 3;
    case CANCELLED = 4;
    case EXPIRED = 5;
    case REFUNDED = 6;
    case VOIDED = 7;

    /**
     * Shows the proper label after casting
     */
    public function label() : string
    {
        return match($this)
        {
            self::PENDING => 'Payment Pending',
            self::SUCCESS => 'Payment Successful',
            self::FAILED => 'Payment Failed',
            self::CANCELLED => 'Payment Cancelled',
            self::REFUNDED => 'Payment Refunded',
            self::VOIDED => 'Payment Voided'
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
}