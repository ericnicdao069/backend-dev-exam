<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function success(Request $request)
    {
        dd($request);
        return 'success';
    }

    public function failed()
    {
        return 'failed';
    }
}
