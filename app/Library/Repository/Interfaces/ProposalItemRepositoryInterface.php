<?php
namespace App\Library\Repository\Interfaces;

use App\Library\Objects\ProposalObject;
use App\Models\Proposal;

interface ProposalItemRepositoryInterface
{
    public function create(ProposalObject $proposalObject, Proposal $proposal, int $productId): void;
}