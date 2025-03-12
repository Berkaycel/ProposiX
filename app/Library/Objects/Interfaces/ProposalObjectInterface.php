<?php
namespace App\Library\Objects\Interfaces;

interface ProposalObjectInterface
{
    public function getSenderId(): int;
    public function setSenderId(int $senderId): self;

    public function getReceiverId(): int;
    public function setReceiverId(int $receiverId): self;

    public function getOfferedAmount(): float;
    public function setOfferedAmount(float $offeredAmount): self;

    public function getOfferAmountText(): string;
    public function setOfferAmountText(string $offerAmountText): self;

    public function getExpirationDate(): string;
    public function setExpirationDate(string $expirationDate): self;

    public function getOfferDescription(): string;
    public function setOfferDescription(string $offerDescription): self;

    public function getQuantity(): int;
    public function setQuantity(int $quantity): self;

    public function getStatus(): string;
    public function setStatus(string $status): self;

    public function setValidatedData(array $validatedData, int $productId): void;

    public function toArray(): array;
}
