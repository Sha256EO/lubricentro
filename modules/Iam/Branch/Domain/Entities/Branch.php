<?php

namespace Modules\Iam\Branch\Domain\Entities;

use Modules\Iam\Branch\Domain\Exceptions\BranchAlreadyMainException;
use Modules\Iam\Branch\Domain\ValueObjects\BranchName;
use Modules\Iam\Branch\Domain\ValueObjects\BranchAddress;
use Modules\Iam\Branch\Domain\ValueObjects\BranchPhone;

class Branch
{
    private ?int $id;
    private BranchName $name;
    private BranchAddress $address;
    private BranchPhone $phone;
    private bool $isMain;

    public function __construct(BranchName $name, BranchAddress $address, BranchPhone $phone, bool $isMain)
    {
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
        $this->isMain = $isMain;
    }

    // DOMAIN FACTORIES
    public static function createMain(
        BranchName $name,
        BranchAddress $address,
        BranchPhone $phone,
    ): self {
        return new self($name, $address, $phone, true);
    }

    public static function createSecondary(
        BranchName $name,
        BranchAddress $address,
        BranchPhone $phone,
    ): self {
        return new self($name, $address, $phone, false);
    }

    // COMPORTAMINETO
    public function markAsMain(): void
    {
        if ($this->isMain) {
            throw new BranchAlreadyMainException();
        }

        $this->isMain = true;
    }

    public function markAsSecondary(): void
    {
        $this->isMain = false;
    }

    public function rename(BranchName $newName): void
    {
        $this->name = $newName;
    }

    public function changeAddress(BranchAddress $newAddress): void
    {
        $this->address = $newAddress;
    }

    public function changePhone(BranchPhone $newPhone): void
    {
        $this->phone = $newPhone;
    }

    // GETTERS
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): BranchName
    {
        return $this->name;
    }

    public function getAddress(): BranchAddress
    {
        return $this->address;
    }

    public function getPhone(): BranchPhone
    {
        return $this->phone;
    }

    public function isMain(): bool
    {
        return $this->isMain;
    }
}