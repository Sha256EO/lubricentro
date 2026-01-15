<?php

namespace Modules\Iam\Branch\Application\Branch\UseCases;

use Modules\Iam\Branch\Application\Branch\DTOs\CreateBranchDto;
use Modules\Iam\Branch\Domain\Entities\Branch;
use Modules\Iam\Branch\Domain\Repositories\BranchRepository;
use Modules\Iam\Branch\Domain\ValueObjects\BranchAddress;
use Modules\Iam\Branch\Domain\ValueObjects\BranchName;
use Modules\Iam\Branch\Domain\ValueObjects\BranchPhone;

class CreateSecondaryBranchUseCase
{
    public function __construct(
        private BranchRepository $repository
    ) {}

    public function execute(CreateBranchDto $dto): void {
        $branch = Branch::createSecondary(
            name: new BranchName($dto->name),
            address: new BranchAddress($dto->address),
            phone: new BranchPhone($dto->phone)
        );

        $this->repository->save($branch);
    }
}