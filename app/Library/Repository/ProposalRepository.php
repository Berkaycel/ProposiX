<?php

namespace App\Library\Repository;

use App\Library\Objects\ProposalObject;
use App\Library\Repository\Interfaces\ProposalRepositoryInterface;
use App\Models\Proposal;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProposalRepository implements ProposalRepositoryInterface
{
    private Proposal $proposal;

    public function getAll(): Collection
    {
        return DB::table('proposals as p')
            ->join('proposal_items as pi2', 'p.id', '=', 'pi2.proposal_id')
            ->where('p.sender_id', Auth::id())
            ->select('p.*', 'pi2.*') 
            ->get();
    }

    public function create(ProposalObject $proposalObject): Proposal
    {
        DB::transaction(function () use ($proposalObject) {
            $proposalArr = $proposalObject->toArray();
            $this->proposal = Proposal::create([
                'sender_id' => $proposalArr['sender_id'],
                'receiver_id' => $proposalArr['receiver_id'],
                'total' => $proposalArr['total'],
                'status' => $proposalArr['status'],
                'offered_amount' => $proposalArr['offered_amount'],
                'last_valid_date' => $proposalArr['last_valid_date']
            ]);
        });
        return $this->proposal;
    }
}
