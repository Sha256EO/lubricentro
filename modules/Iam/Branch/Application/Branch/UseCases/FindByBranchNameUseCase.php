<?php

namespace Modules\Iam\Branch\Application\Branch\UseCases;

use Modules\Iam\Branch\Domain\Entities\Branch;
use Modules\Iam\Branch\Domain\Repositories\BranchRepository;
use Modules\Iam\Branch\Domain\ValueObjects\BranchName;

class FindByBranchNameUseCase
{
    public function __construct(
        private BranchRepository $repository
    ) {}

    public function execute(BranchName $name): ?Branch
    {
        return $this->repository->findByName($name);
    }
}