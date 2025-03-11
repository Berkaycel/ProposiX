<?php
namespace App\Http\Controllers;

use App\Http\Requests\Products\CreateRequest;
use App\Http\Requests\Products\UpdateRequest;
use App\Library\Objects\Interfaces\ProductObjectInterface;
use App\Library\Repository\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct(
        private readonly ProductObjectInterface $productObject,
        private readonly ProductRepositoryInterface $productRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): RedirectResponse|View
    {
        try {
            $products = $this->productRepository->getAll();
            return view('dashboard.product.index', compact('products'));
        } catch (\Throwable $th) {
            Log::error("Error occurred while fetching products: ".$th->getMessage());
            flash()->error('Ürünler sayfasının listelemesinde bir sorun oluştu!');
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): RedirectResponse|View
    {
        try {
            return view('dashboard.product.create');
        } catch (\Throwable $th) {
            Log::error("Error occurred while loading product creation page: ".$th->getMessage());
            flash()->error('Ürün oluşturma sayfası yüklenirken bir hata oluştu!');
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        try {
            $this->productObject->setValidatedData($request->validated());
            $this->productRepository->create($this->productObject);

            flash()->success('Ürün başarıyla eklendi!');
            return redirect()->route('product.index');
        } catch (\Throwable $th) {
            Log::error("Error occurred during product creation: ".$th->getMessage());
            flash()->error('Ürün ekleme sırasında bir hata oluştu!');
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $productId): RedirectResponse|View
    {
        try {
            $product = $this->productRepository->findById($productId);
            if (!$product) {
                flash()->error('Ürün bulunamadı!');
                return redirect()->back();
            }

            return view('dashboard.product.edit', compact('product'));
        } catch (\Throwable $th) {
            Log::error("Error occurred while loading product edit page: ".$th->getMessage());
            flash()->error('Ürün düzenleme sayfası yüklenirken bir hata oluştu!');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $productId): RedirectResponse
    {
        try {
            $this->productObject->setValidatedData($request->validated());
            $this->productRepository->update($this->productObject, $productId);

            flash()->success('Ürün başarıyla güncellendi!');
            return redirect()->route('product.index');
        } catch (\Throwable $th) {
            Log::error("Error occurred during product update: ".$th->getMessage());
            flash()->error('Ürün güncellenirken bir hata oluştu!');
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deactivate(int $productId): RedirectResponse
    {
        try {
            $this->productRepository->deactivate((int)$productId);

            flash()->success('Ürün kaydı başarıyla silindi!');
            return redirect()->route('product.index');
        } catch (\Throwable $th) {
            Log::error("Error occurred during product deletion: ".$th->getMessage());
            flash()->error('Ürün silme işleminde bir sorun oluştu!');
            return redirect()->back();
        }
    }
}
