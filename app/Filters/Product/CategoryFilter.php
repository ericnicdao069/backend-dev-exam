<?php

namespace App\Filters\Product;

use Closure;
use App\Filters\Pipe;

class CategoryFilter implements Pipe
{
    /**
     * Filters product category
     * 
    * @param \Illuminate\Database\Query\Builder $model
    * @param \Closure $next
    * 
    * @return \Closure
    */
    public function filter($products, Closure $next)
    {
        if (request()->has("category") && isset(request()->category)) {
            $products->where('category', request()->category);
        }

        return $next($products);
    }
}