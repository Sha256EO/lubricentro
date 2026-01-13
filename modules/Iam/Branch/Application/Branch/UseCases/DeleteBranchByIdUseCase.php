<?php

namespace Modules\Iam\Branch\Application\Branch\UseCases;

use Modules\Iam\Branch\Domain\Repositories\BranchRepository;

class DeleteBranchByIdUseCase
{
    public function __construct(
        private BranchRepository $repository
    ) {}

    public function execute(int $id): void
    {
        $this->repository->deleteById($id);
    }
}