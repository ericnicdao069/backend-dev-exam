<?php

namespace App\Filters\Product;

use Closure;
use App\Filters\Pipe;

class SearchFilter implements Pipe
{
    /**
     * Filters product name and description by what is provided by the search term (keyword)
     * 
     * @param \Illuminate\Database\Query\Builder $model
     * @param \Closure $next
     * 
     * @return \Closure
     */
    public function filter($products, Closure $next)
    {
        if (request()->has('keyword') && isset(request()->keyword)) {
            $products->where(function ($q) {
                $term = request()->keyword;
    
                $q->where('name', 'LIKE', "%$term%")
                    ->orWhere('description', 'LIKE', "%$term%");
            });
        }

        return $next($products);
    }
}