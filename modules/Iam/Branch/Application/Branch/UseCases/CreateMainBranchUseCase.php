<?php

namespace Modules\Iam\Branch\Application\Branch\UseCases;

use Modules\Iam\Branch\Application\Branch\DTOs\CreateBranchDto;
use Modules\Iam\Branch\Domain\Entities\Branch;
use Modules\Iam\Branch\Domain\Policies\BranchPolicy;
use Modules\Iam\Branch\Domain\Repositories\BranchRepository;
use Modules\Iam\Branch\Domain\ValueObjects\BranchAddress;
use Modules\Iam\Branch\Domain\ValueObjects\BranchName;
use Modules\Iam\Branch\Domain\ValueObjects\BranchPhone;

class CreateMainBranchUseCase
{
    public function __construct(
        private BranchRepository $repository,
        private BranchPolicy $policy
    ) {}

    public function execute(CreateBranchDto $dto): void {
        $branches = $this->repository->all();

        $this->policy->ensureOnlyOneMainBranch($branches);

        $branch = Branch::createMain(
            name: new BranchName($dto->name),
            address: new BranchAddress($dto->address),
            phone: new BranchPhone($dto->phone)
        );

        $this->repository->save($branch);
    }
}