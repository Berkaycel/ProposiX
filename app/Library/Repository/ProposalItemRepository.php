<?php
namespace App\Library\Repository;

use App\Library\Objects\ProposalObject;
use App\Library\Repository\Interfaces\ProposalItemRepositoryInterface;
use App\Models\Product;
use App\Models\Proposal;
use App\Models\ProposalItem;
use Illuminate\Support\Facades\DB;

class ProposalItemRepository implements ProposalItemRepositoryInterface
{
    public function create(ProposalObject $proposalObject, Proposal $proposal, int $productId): void
    {
        DB::transaction(function() use($proposalObject, $proposal, $productId) {
            $proposalArr = $proposalObject->toArray();
            ProposalItem::create([
                'proposal_id' => $proposal->id, 
                'product_id' => $productId, 
                'quantity' => $proposalArr['quantity'], 
                'total' => $proposalArr['quantity'] * Product::find($productId)->unit_price
            ]);
        });
    }
}
