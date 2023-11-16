<?php

namespace App\Http\Controllers\Api;

use App\Filters\Product\CategoryFilter;
use App\Filters\Product\SearchFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\StoreRequest;
use App\Http\Requests\Api\Product\UpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductController extends Controller
{
    /**
     * Returns list of products
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Resource\Json\JsonResource
     */
    public function index(Request $request)
    {
        $query = Product::query();

        $products = app(Pipeline::class)
            ->send($query)
            ->through([
                CategoryFilter::class,
                SearchFilter::class
            ])->via("filter")
            ->then(function ($q) {
                return $q->orderBy('created_at', 'DESC')->paginate(5);
            });

        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \App\Http\Requests\Api\ProductRequest $request
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        DB::beginTransaction();

        try {
            $product = Product::create($request->validated());

            $this->storeMedia($product, $request->images);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);

            return response()->json([
                'errors' => $e->getMessage()
            ]);
        }

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \App\Http\Requests\Api\UpdateRequest $request
     * @param \App\Models\Product $product
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, Product $product)
    {
        DB::beginTransaction();

        try {
            $product->update($request->validated());

            $this->storeMedia($product, $request->images);

            if ($request->deletedImages) {
                foreach ($request->deletedImages as $id) {
                    $media = Media::find($id);
                    $media->delete();
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);

            return response()->json([
                'errors' => $e->getMessage()
            ]);
        }

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Deletes a product
     * 
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
        } catch (\Exception $e) {
            Log::error($e);

            return response()->json([
                'errors' => $e->getMessage()
            ]);
        }

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Saves the images to the public storage
     * 
     * @param \App\Models\Product $product
     * @param array $images
     */
    protected function storeMedia($product, $images)
    {
        if ($images) {
            foreach ($images as $image) {
                $product->addMedia($image)->toMediaCollection();
            }
        }
    }
}
