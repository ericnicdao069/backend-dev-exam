<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PaymentController extends Controller
{
    public function success(Request $request)
    {
        return Inertia::render('Payment/success');
    }

    public function failed()
    {
        return Inertia::render('Payment/failed');
    }
}
