<?php

namespace App\Http\Controllers;

use App\Enums\PaymentMethod;
use App\Http\Requests\Api\Cart\StoreRequest;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Inertia\Inertia;
// use Luigel\Paymongo\Facades\Paymongo;

class CartController extends Controller
{
    public function create()
    {
        return Inertia::render('Cart/CheckoutComponent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * For card / e-wallet sample test data:
     * https://developers.maya.ph/reference/sandbox-credentials-and-cards
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try {
            $order = auth()->user()->orders()->create([
                'total_amount' => $request->payable,
                'contact' => $request->contact,
                'address' => $request->address,
                'payment_method' => PaymentMethod::GCASH->value,
            ]);
    
            $order->products()->attach($request->products);
    
            $payment = PaymentService::startPaymentProcess($request, $order);

            $order->update([
                'paymongo_reference_id' => $payment->reference
            ]);
    
            return $payment->redirect;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);

            return response()->json([
                'errors' => $e->getMessage()
            ]);
        }
    }
}
