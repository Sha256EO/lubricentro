<?php

namespace Modules\Iam\Branch\Application\Branch\UseCases;

use Modules\Iam\Branch\Application\Branch\DTOs\UpdateBranchDto;
use Modules\Iam\Branch\Application\Exceptions\BranchNotFoundException;
use Modules\Iam\Branch\Domain\Repositories\BranchRepository;
use Modules\Iam\Branch\Domain\ValueObjects\BranchAddress;
use Modules\Iam\Branch\Domain\ValueObjects\BranchName;
use Modules\Iam\Branch\Domain\ValueObjects\BranchPhone;

class UpdateBranchUseCase
{
    public function __construct(
        private BranchRepository $repository
    ) {}

    public function execute(UpdateBranchDto $dto): void {
        $branch = $this->repository->findById($dto->id);

        if ($branch === null) {
            throw new BranchNotFoundException();
        }

        if ($dto->name !== null) {
            $branch->rename(new BranchName($dto->name));
        }

        if ($dto->address !== null) {
            $branch->changeAddress(new BranchAddress($dto->address));
        }

        if ($dto->phone !== null) {
            $branch->changePhone(new BranchPhone($dto->phone));
        }

        $this->repository->save($branch);
    }
}