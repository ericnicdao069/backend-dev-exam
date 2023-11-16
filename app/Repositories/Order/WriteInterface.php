<?php

namespace App\Repositories\Order;

use App\Models\Order;

interface WriteInterface
{
    /**
     * Store specific data.
     *
     * @param  array $data
     * @return $this
     */
    public function store(array $data);

    /**
     * Update specific data.
     *
     * @param  \App\Models\Order  $order
     * @param  array  $data
     * @return $this
     */
    public function update(Order $order, array $data);
}