<?php

namespace App\Http\Controllers;

use App\Http\Requests\Proposal\CreateRequest;
use App\Library\Objects\Interfaces\ProposalObjectInterface;
use App\Library\Repository\Interfaces\ProposalRepositoryInterface;
use App\Library\Services\Interfaces\ProductServiceInterface;
use App\Library\Services\Interfaces\ProposalServiceInterface;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProposalController extends Controller
{
    public function __construct(
        private readonly ProductServiceInterface $productService,
        private readonly ProposalObjectInterface $proposalObject,
        private readonly ProposalServiceInterface $proposalService,
        private readonly ProposalRepositoryInterface $proposalRepository
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $proposals = $this->proposalRepository->getAll();
            return view('dashboard.proposal.index', compact('proposals'));
        } catch (\Throwable $th) {
            Log::error("Error occurred during proposal loading: " . $th->getMessage());
            flash()->error('Teklifler yüklenirken bir hata oluştu!');
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $productId)
    {
        try {
            $user = Auth::user();
            $product = Product::findOrFail($productId);
            return view('dashboard.proposal.create', compact('product', 'user'));
        } catch (\Throwable $th) {
            Log::error("Error occurred during proposal create page loading: " . $th->getMessage());
            flash()->error('Teklif oluşturma sayfası yüklenirken bir hata oluştu!');
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request, int $productId)
    {
        try {
            $this->proposalObject->setValidatedData($request->validated(), $productId);

            $this->proposalService->createProposal($this->proposalObject, $productId);

            flash()->success('Teklif başarıyla oluşturuldu!');
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Log::error("Error occurred during proposal creation: " . $th->getMessage());
            flash()->error('Teklif oluşturulurken bir hata oluştu!');
            return redirect()->back()->withErrors($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
