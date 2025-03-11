<?php
namespace App\Library\Objects;

use App\Library\Objects\Interfaces\ProductObjectInterface;
use Illuminate\Support\Facades\Auth;

class ProductObject implements ProductObjectInterface
{
    private string $name;
    private float $unitPrice;
    private int $quantity;
    private string $description;
    private string $status;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(float $unitPrice): self
    {
        $this->unitPrice = $unitPrice;
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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
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

    /**
     * Validated verileri lokal verilere eşitleyen method
     */
    public function setValidatedData(array $validatedData): void
    {
        $this->setName($validatedData['name']);
        $this->setUnitPrice($validatedData['unit_price']);
        $this->setQuantity($validatedData['quantity']);
        $this->setDescription($validatedData['description']);
        $this->setStatus($validatedData['status']);
    }

    /**
     * ProductObject değişkenlerini array olarak döner.
     */
    public function toArray(): array
    {
        return [
            'user_id' => Auth::id(),
            'name' => $this->getName(),
            'unit_price' => $this->getUnitPrice(),
            'quantity' => $this->getQuantity(),
            'description' => $this->getDescription(),
            'status' => $this->getStatus(),
        ];
    }
}
