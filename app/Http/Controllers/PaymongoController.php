<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymongoController extends Controller
{
    public function paymentPaid(Request $request)
    {
        return 'paid';
    }
}
