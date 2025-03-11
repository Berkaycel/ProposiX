<?php

namespace App\Library\Objects\Interfaces;

interface ProductObjectInterface
{
    /**
     * Get the product name.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Set the product name.
     *
     * @param string $name
     * @return self
     */
    public function setName(string $name): self;

    /**
     * Get the unit price.
     *
     * @return float
     */
    public function getUnitPrice(): float;

    /**
     * Set the unit price.
     *
     * @param float $unitPrice
     * @return self
     */
    public function setUnitPrice(float $unitPrice): self;

    /**
     * Get the quantity.
     *
     * @return int
     */
    public function getQuantity(): int;

    /**
     * Set the quantity.
     *
     * @param int $quantity
     * @return self
     */
    public function setQuantity(int $quantity): self;

    /**
     * Get the description.
     *
     * @return string
     */
    public function getDescription(): string;

    /**
     * Set the description.
     *
     * @param string $description
     * @return self
     */
    public function setDescription(string $description): self;

    /**
     * Get the status.
     *
     * @return string
     */
    public function getStatus(): string;

    /**
     * Set the status.
     *
     * @param string $status
     * @return self
     */
    public function setStatus(string $status): self;

    /**
     * Set the validated data into the object.
     *
     * @param array $validatedData
     * @return void
     */
    public function setValidatedData(array $validatedData): void;

    /**
     * Convert the product object to an array.
     *
     * @return array
     */
    public function toArray(): array;
}
