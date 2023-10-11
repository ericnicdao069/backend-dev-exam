<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatus;
use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PaymentController extends Controller
{
    public function success(Request $request, Order $order = null)
    {
        $order->update([
            'payment_status' => PaymentStatus::SUCCESS->value
        ]);

        return Inertia::render('Payment/success');
    }

    public function failed()
    {
        return Inertia::render('Payment/failed');
    }
}
