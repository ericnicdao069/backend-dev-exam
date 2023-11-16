<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\Cart\StoreRequest;
use App\Repositories\Order\WriteInterface as OrderWriteInterface;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderWriteInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

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
            $order = $this->orderRepository->store($request->data());

            $order->products()->attach($request->products);
    
            $payment = PaymentService::startPaymentProcess($request, $order);

            $this->orderRepository->update($order, [
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
