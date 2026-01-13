<?php

namespace Modules\Iam\Branch\Application\Branch\UseCases;

use Modules\Iam\Branch\Domain\Entities\Branch;
use Modules\Iam\Branch\Domain\Repositories\BranchRepository;
use Modules\Iam\Branch\Domain\ValueObjects\BranchAddress;
use Modules\Iam\Branch\Domain\ValueObjects\BranchName;
use Modules\Iam\Branch\Domain\ValueObjects\BranchPhone;

class CreateMainBranchUseCase
{
    public function __construct(
        private BranchRepository $repository
    ) {}

    public function execute(
        BranchName $name,
        BranchAddress $address,
        BranchPhone $phone
    ): void {
        $branch = Branch::createMain(
            name: $name,
            address: $address,
            phone: $phone
        );

        $this->repository->save($branch);
    }
}