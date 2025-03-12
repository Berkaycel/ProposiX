<?php

namespace App\Library\Services;

use App\Library\Services\Interfaces\ProductServiceInterface;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductService implements ProductServiceInterface
{
    public function getNewestProducts(): Collection
    {
        return DB::table('products')
            ->where('user_id', '<>', Auth::id())
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->get();
    }

    public function getTopOfferedProducts(): Collection
    {
        return DB::table('proposal_items')
            ->select('products.*', DB::raw('COUNT(*) as proposal_count'))
            ->join('products', 'proposal_items.product_id', '=', 'products.id')
            ->where('products.user_id', '<>', Auth::id())
            ->groupBy('product_id', 'products.id')
            ->orderByDesc('proposal_count')
            ->limit(5)
            ->get();
    }

    public function getTopFiveProductsOfAcceptedOffer(): Collection
    {
        return DB::table('proposal_items')
            ->join('proposals', 'proposal_items.proposal_id', '=', 'proposals.id')
            ->join('products', 'proposal_items.product_id', '=', 'products.id') 
            ->select('products.*', DB::raw('COUNT(*) as accepted_count'))
            ->where('proposals.status', 'ACTIVE')
            ->where('proposals.receiver_id', '<>', Auth::id())
            ->groupBy('proposal_items.product_id', 'products.id')
            ->orderByDesc('accepted_count')
            ->limit(5)
            ->get();
    }

    public function getHomeProducts(int $page, int $limit): LengthAwarePaginator
    {
        return Product::where('user_id', '<>', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate($limit, ['id', 'name', 'unit_price', 'description'], 'page', $page);
    }
}
