<?php

namespace App\Filters;

use Closure;

interface Pipe {
    /**
     * @param \Illuminate\Database\Query\Builder $model
     * @param \Closure $next
     * 
     * @return \Closure
     */
    public function filter($model, Closure $next);
}