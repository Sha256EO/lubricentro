<?php

namespace Modules\Iam\Branch\Application\Branch\UseCases;

use Modules\Iam\Branch\Domain\Entities\Branch;
use Modules\Iam\Branch\Domain\Repositories\BranchRepository;

class FindByIdUseCase
{
    public function __construct(
        private BranchRepository $repository
    ) {}

    public function execute(int $id): ?Branch
    {
        return $this->repository->findById($id);
    }
}