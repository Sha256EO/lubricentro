<?php

namespace Modules\Iam\Branch\Application\Branch\UseCases;

use Modules\Iam\Branch\Application\Branch\DTOs\BranchCollertorDto;
use Modules\Iam\Branch\Application\Branch\Mapper\BranchMapper;
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
    public function execute(): BranchCollertorDto
    {
        $branches = $this->repository->all();

        return BranchMapper::toCollector($branches);
    }
}