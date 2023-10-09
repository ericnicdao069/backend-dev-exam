<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'admin_id',
        'total_amount',
        'payment_status'
    ];

    /**
     * The roles that belong to the user.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
