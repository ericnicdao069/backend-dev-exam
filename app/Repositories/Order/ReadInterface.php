<?php

namespace App\Repositories\Order;

use App\Models\Order;

interface ReadInterface
{
    /**
     * Reads all data
     *
     * @param  array $filters
     * @return $this
     */
    public function all(array $filters);

    /**
     * Read a single data
     *
     * @param  \App\Models\Order $order
     * @return $this
     */
    public function show(Order $order);
}