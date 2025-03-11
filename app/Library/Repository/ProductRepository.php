<?php

namespace App\Library\Repository;

use App\Library\Enums\ProductStatus;
use App\Library\Objects\ProductObject;
use App\Library\Repository\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll(): Collection
    {
        return DB::table('products')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select('products.id', 'products.name', 'products.unit_price', 'products.quantity', 'products.description', 'products.status', 'users.name as user_name')
            ->where('products.user_id', Auth::id())
            ->get()
            ->map(function ($product) {
                $product->status_label = ProductStatus::from($product->status)->label();
                return $product;
            });
    }

    public function findById(int $productId): Product
    {
        return Product::find($productId)->first();
    }

    public function create(ProductObject $productObject): void
    {
        DB::transaction(function() use($productObject){
            Product::create($productObject->toArray());
        });
    }

    public function update(ProductObject $productObject, int $productId): void
    {
        DB::transaction(function() use($productObject, $productId){
            $product = Product::findOrFail($productId);
            $product->update($productObject->toArray());
        });
    }

    public function deactivate(int $productId): void
    {
        DB::transaction(function() use($productId){
            $product = Product::findOrFail($productId);
            $product->update([
                "status" => ProductStatus::NOT_FOR_SALE->value
            ]);
        });
    }
}
