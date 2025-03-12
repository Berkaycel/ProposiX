<?php
namespace App\Library\Objects;

use App\Library\Enums\ProposalStatus;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Library\Objects\Interfaces\ProposalObjectInterface;

class ProposalObject implements ProposalObjectInterface
{
    private int $senderId;
    private int $receiverId;
    private float $offeredAmount;
    private string $offerAmountText;
    private string $expirationDate;
    private string $offerDescription;
    private int $quantity;
    private string $status;

    public function getSenderId(): int
    {
        return $this->senderId;
    }

    public function setSenderId(int $senderId): self
    {
        $this->senderId = $senderId;
        return $this;
    }

    public function getReceiverId(): int
    {
        return $this->receiverId;
    }

    public function setReceiverId(int $receiverId): self
    {
        $this->receiverId = $receiverId;
        return $this;
    }

    public function getOfferedAmount(): float
    {
        return $this->offeredAmount;
    }

    public function setOfferedAmount(float $offeredAmount): self
    {
        $this->offeredAmount = $offeredAmount;
        return $this;
    }

    public function getOfferAmountText(): string
    {
        return $this->offerAmountText;
    }

    public function setOfferAmountText(string $offerAmountText): self
    {
        $this->offerAmountText = $offerAmountText;
        return $this;
    }

    public function getExpirationDate(): string
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(string $expirationDate): self
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    public function getOfferDescription(): string
    {
        return $this->offerDescription;
    }

    public function setOfferDescription(string $offerDescription): self
    {
        $this->offerDescription = $offerDescription;
        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    
    public function setValidatedData(array $validatedData, int $productId): void
    {
        $this->setSenderId(Auth::id());
        
        $product = Product::find($productId);
        $this->setReceiverId($product->user_id);  

        $this->setOfferedAmount($validatedData['offer_amount_number']);
        $this->setOfferAmountText($validatedData['offer_amount_text']);
        $this->setExpirationDate($validatedData['expiration_date']);
        $this->setOfferDescription($validatedData['offer_description']);
        $this->setQuantity($validatedData['quantity']);
        $this->setStatus(ProposalStatus::ACTIVE->value);  
    }

    
    public function toArray(): array
    {
        return [
            'sender_id' => $this->getSenderId(),
            'receiver_id' => $this->getReceiverId(),
            'total' => $this->getOfferedAmount(),
            'offered_amount' => $this->getOfferAmountText(),
            'last_valid_date' => $this->getExpirationDate(),
            'description' => $this->getOfferDescription(),
            'quantity' => $this->getQuantity(),
            'status' => $this->getStatus(),
        ];
    }
}
