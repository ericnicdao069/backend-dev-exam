<?php

namespace App\Http\Controllers;

use App\Enums\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
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
    public function store(Request $request)
    {
        try
        {
            DB::beginTransaction();
            $user = auth()->user();

            if (is_null($order)) {
                $order = $request->validated();

                $order = $user->orders()->create($order);
            } 

            // TODO: Prepare necessary data for payload
            if (in_array($request->payment_method, PaymongoService::getBankOptions())) {
                // Perform Intent or Complete Transaction
            } else {
                // E-Wallets
            }

            DB::commit();

            return;

        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);

            return response()->json([
                'errors' => $e->getMessage()
            ]);
        }
    }
}