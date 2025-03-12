<?php
namespace App\Library\Repository\Interfaces;

use App\Library\Objects\ProposalObject;
use App\Models\Proposal;
use Illuminate\Support\Collection;

interface ProposalRepositoryInterface
{
    public function getAll(): Collection;
    public function create(ProposalObject $proposalObject): Proposal;
}