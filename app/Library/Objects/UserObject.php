<?php
namespace App\Library\Objects;

use App\Library\Enums\UserType;
use App\Library\Objects\Interfaces\UserObjectInterface;
use Illuminate\Support\Facades\Hash;

class UserObject implements UserObjectInterface
{
    private string $name;
    private ?string $phone;
    private ?string $identity;
    private string $password;
    private string $email;
    private ?string $address;
    private ?string $tradeRegistry;
    private ?int $taxNo;
    private ?int $taxIdentityNo;
    private ?string $company_name;
    private ?string $user_type;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    public function getIdentity(): ?string
    {
        return $this->identity;
    }

    public function setIdentity(?string $identity): self
    {
        $this->identity = $identity;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = Hash::make($password);
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function getTradeRegistry(): ?string
    {
        return $this->tradeRegistry;
    }

    public function setTradeRegistry(?string $tradeRegistry): self
    {
        $this->tradeRegistry = $tradeRegistry;
        return $this;
    }

    public function getTaxNo(): ?int
    {
        return $this->taxNo;
    }

    public function setTaxNo(?int $taxNo): self
    {
        $this->taxNo = $taxNo;
        return $this;
    }

    public function getTaxIdentityNo(): ?int
    {
        return $this->taxIdentityNo;
    }

    public function setTaxIdentityNo(?int $taxIdentityNo): self
    {
        $this->taxIdentityNo = $taxIdentityNo;
        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->company_name;
    }

    public function setCompanyName(?string $company_name): self
    {
        $this->company_name = $company_name;
        return $this;
    }

    public function getUserType()
    {
        return $this->user_type;
    }

    public function setUserType(?string $user_type)
    {
        if($user_type === "customer")
        {
            $this->user_type = UserType::CUSTOMER->value;
            return $this;
        }
        $this->user_type = UserType::COMPANY->value;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'identity' => $this->identity,
            'email' => $this->email,
            'password' => $this->password,
            'address' => $this->address,
            'trade_registry' => $this->tradeRegistry,
            'tax_no' => $this->taxNo,
            'tax_identity_no' => $this->taxIdentityNo,
            'company_name' => $this->company_name,
            'user_type' => $this->user_type
        ];
    }
}
