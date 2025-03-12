<?php
namespace App\Library\Services\Interfaces;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ProductServiceInterface
{
    public function getNewestProducts(): Collection;
    public function getTopOfferedProducts(): Collection;
    public function getTopFiveProductsOfAcceptedOffer(): Collection;
    public function getHomeProducts(int $page, int $limit): LengthAwarePaginator;
}