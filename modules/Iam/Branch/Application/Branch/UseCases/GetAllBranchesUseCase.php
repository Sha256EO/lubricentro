<?php

namespace Modules\Iam\Branch\Application\Branch\UseCases;

use Modules\Iam\Branch\Domain\Entities\Branch;
use Modules\Iam\Branch\Domain\Repositories\BranchRepository;

class GetAllBranchesUseCase
{
    public function __construct(
        private BranchRepository $repository
    ) {}

    /**
     * @return iterable<Branch>
     */
    public function execute(): iterable
    {
        return $this->repository->all();
    }
}