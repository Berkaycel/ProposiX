<?php

namespace App\Http\Controllers;

use App\Library\Services\Interfaces\ProductServiceInterface;

class HomeController extends Controller
{
    public function __construct(
        private readonly ProductServiceInterface $productService
    ){}

    public function index()
    {
        try {
            $newestProducts = $this->productService->getNewestProducts();
            $topOfferedProducts = $this->productService->getTopOfferedProducts();
            $topFiveProductsOfAcceptedOffer = $this->productService->getTopFiveProductsOfAcceptedOffer();
            return view('dashboard.index', compact('newestProducts', 'topOfferedProducts', 'topFiveProductsOfAcceptedOffer'));
        } catch (\Throwable $th) {
            dd("Error:".$th->getMessage());
        }
    }
}
