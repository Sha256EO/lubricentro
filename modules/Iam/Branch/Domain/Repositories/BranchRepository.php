<?php

namespace Modules\Iam\Branch\Domain\Repositories;

use Modules\Iam\Domain\Entities\Branch;
use Modules\Iam\Domain\ValueObjects\BranchName;

interface BranchRepository
{
    public function save(Branch $branch): void;

    public function deleteById(int $id): void;

    public function findById(int $id): ?Branch;

    public function findByName(BranchName $name): ?Branch;

    /**
     * @return iterable<Branch>
     */
    public function all(): iterable;
}