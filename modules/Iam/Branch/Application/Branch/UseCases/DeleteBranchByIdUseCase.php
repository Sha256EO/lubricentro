<?php

namespace Modules\Iam\Branch\Application\Branch\UseCases;

use Modules\Iam\Branch\Application\Branch\Exceptions\CannotDeleteMainBranchException;
use Modules\Iam\Branch\Application\Exceptions\BranchNotFoundException;
use Modules\Iam\Branch\Domain\Repositories\BranchRepository;

class DeleteBranchByIdUseCase
{
    public function __construct(
        private BranchRepository $repository
    ) {}

    public function execute(int $id): void
    {
        $branch = $this->repository->findById($id);

        if ($branch === null) {
            throw new BranchNotFoundException();
        }

        if ($branch->isMain()) {
            throw new CannotDeleteMainBranchException();
        }

        $this->repository->deleteById($id);
    }
}