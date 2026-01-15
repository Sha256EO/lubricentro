<?php

namespace Modules\Iam\Branch\Application\Branch\UseCases;

use Modules\Iam\Branch\Application\Branch\DTOs\BranchResponseDto;
use Modules\Iam\Branch\Application\Branch\DTOs\FindBranchByNameDto;
use Modules\Iam\Branch\Application\Branch\Mapper\BranchMapper;
use Modules\Iam\Branch\Application\Exceptions\BranchNotFoundException;
use Modules\Iam\Branch\Domain\Repositories\BranchRepository;
use Modules\Iam\Branch\Domain\ValueObjects\BranchName;

class FindByBranchNameUseCase
{
    public function __construct(
        private BranchRepository $repository
    ) {}

    public function execute(FindBranchByNameDto $dto): BranchResponseDto
    {
        $branch = $this->repository->findByName(
            new BranchName($dto->name)
        );

        if ($branch === null) {
            throw new BranchNotFoundException();
        }

        return BranchMapper::toDto($branch);
    }
}