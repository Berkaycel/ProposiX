<?php
namespace App\Library\Repository\Interfaces;

use App\Library\Objects\ProductObject;
use App\Models\Product;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
    public function getAll(): Collection;
    public function findById(int $productId): Product;
    public function create(ProductObject $productObject): void;
    public function update(ProductObject $productObject, int $productId): void;
    public function deactivate(int $productId): void;
}