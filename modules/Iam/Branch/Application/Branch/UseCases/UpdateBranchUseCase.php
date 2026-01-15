<?php

namespace Modules\Iam\Branch\Application\Branch\UseCases;

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

    public function execute(
        int $id,
        ?BranchName $name,
        ?BranchAddress $address,
        ?BranchPhone $phone
    ): void {
        $branch = $this->repository->findById($id);

        if ($branch === null) {
            throw new BranchNotFoundException();
        }

        if ($name !== null) {
            $branch->rename($name);
        }

        if ($address !== null) {
            $branch->changeAddress($address);
        }

        if ($phone !== null) {
            $branch->changePhone($phone);
        }

        $this->repository->save($branch);
    }
}