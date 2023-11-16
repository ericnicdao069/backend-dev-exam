<?php

namespace App\Http\Controllers;

use App\Enums\PaymentMethod;
// use App\Services\PayMongoService;
use App\Http\Requests\Api\Cart\StoreRequest;
use App\Services\PaymentFactory;
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
     * ACCEPTED CARDS
     *    4343434343434345
     *    5555444444444457
     * FAILED CARDS - INSUFICIENT FUNDS
     *    5100000000000198
     *    5240460000001466
     * FAILED CARDS - NEED TO CONTACT
     *    4400000000000016
     * FAILED CARDS - FRAUD
     *    4600000000000014
     * FAILED CARDS - UNAVAILABLE
     *    5500000000000194
     *
     * https://developers.paymongo.com/docs/testing
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $order = auth()->user()->orders()->create([
            'total_amount' => $request->payable,
            'contact' => $request->contact,
            'address' => $request->address,
            'payment_method' => PaymentMethod::GCASH->value,
        ]);

        $order->products()->attach($request->products);

        $paymentFactory = new PaymentFactory($request, $order);
        $paymentIntent = $paymentFactory->initializePayment();
        $payment = $paymentIntent->pay();

        $gcashSrc = $paymongo->createSource($request->payable, $order);

        $order->update([
            'paymongo_reference_id' => $gcashSrc->id
        ]);

        return $gcashSrc->redirect['checkout_url'];

        try
        {
            // DB::beginTransaction();
            // $user = auth()->user();

            // if (is_null($order)) {
            //     $order = $request->validated();

            //     $order = $user->orders()->create($order);
            // } 

            // // TODO: Prepare necessary data for payload
            // if (in_array($request->payment_method, PaymongoService::getBankOptions())) {
            //     // Perform Intent or Complete Transaction
            // } else {
            //     // E-Wallets
            // }

            // DB::commit();

            // return;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);

            return response()->json([
                'errors' => $e->getMessage()
            ]);
        }
    }
}
