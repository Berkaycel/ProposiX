<?php
namespace App\Library\Services\Interfaces;

use App\Library\Objects\ProposalObject;

interface ProposalServiceInterface
{
    public function createProposal(ProposalObject $object, int $productId): void;
}