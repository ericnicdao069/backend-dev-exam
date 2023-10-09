<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{
    public function create()
    {
        return Inertia::render('Cart/CheckoutComponent');
    }
}
