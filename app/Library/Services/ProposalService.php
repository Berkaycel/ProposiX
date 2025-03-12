<?php
namespace App\Library\Services;

use App\Library\Objects\ProposalObject;
use App\Library\Repository\Interfaces\ProposalItemRepositoryInterface;
use App\Library\Repository\Interfaces\ProposalRepositoryInterface;
use App\Library\Services\Interfaces\ProposalServiceInterface;

class ProposalService implements ProposalServiceInterface
{
    public function __construct(
        private readonly ProposalRepositoryInterface $proposalRepository,
        private readonly ProposalItemRepositoryInterface $proposalItemRepository
    ){}

    public function createProposal(ProposalObject $object, int $productId): void
    {
        $proposal = $this->proposalRepository->create($object);
        $this->proposalItemRepository->create($object, $proposal, $productId);
    }
}
