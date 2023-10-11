<?php

namespace App\Http\Controllers;

use App\Enums\ProductCategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Inertia::render('Product/ListComponent', [
            'categoryEnum' => ProductCategory::getOptions()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function form(Request $request, Product $product = null)
    {
        if ($product) {
            $product->load(['media']);
        }

        return Inertia::render('Product/FormComponent', [
            'product' => $product,
            'categoryEnum' => ProductCategory::getOptions()
        ]);
    }
}
