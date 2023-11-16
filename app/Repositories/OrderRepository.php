<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Order\WriteInterface;
use App\Repositories\Order\ReadInterface;
use Illuminate\Support\Facades\DB;

class OrderRepository implements WriteInterface, ReadInterface
{
    /**
     * Reads all data
     *
     * @param  array $filters
     * @return $this
     */
    public function all(array $filters)
    {
        return Order::all();
    }

    /**
     * Read a single data
     *
     * @param  \App\Models\Order $order
     * @return $this
     */
    public function show(Order $order)
    {
        return $order;
    }

    /**
     * Store specific data.
     *
     * @param  array $data
     * @return $this
     */
    public function store(array $data)
    {
        return Order::create($data);
    }

    /**
     * Update specific data.
     *
     * @param  \App\Models\Order $order
     * @param  array  $data
     * @return $this
     */
    public function update(Order $order, array $data)
    {
        $order->update($data);
    }
}