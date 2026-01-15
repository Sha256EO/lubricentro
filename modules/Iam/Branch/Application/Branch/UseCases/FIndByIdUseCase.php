<?php

namespace Modules\Iam\Branch\Application\Branch\UseCases;

use Modules\Iam\Branch\Application\Branch\DTOs\BranchResponseDto;
use Modules\Iam\Branch\Application\Branch\Mapper\BranchMapper;
use Modules\Iam\Branch\Application\Exceptions\BranchNotFoundException;
use Modules\Iam\Branch\Domain\Entities\Branch;
use Modules\Iam\Branch\Domain\Repositories\BranchRepository;

class FindByIdUseCase
{
    public function __construct(
        private BranchRepository $repository
    ) {}

    public function execute(int $id): BranchResponseDto
    {
        $branch = $this->repository->findById($id);

        if ($branch === null) {
            throw new BranchNotFoundException();
        }

        return BranchMapper::toDto($branch);
    }
}