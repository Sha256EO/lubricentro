<?php

namespace Modules\Iam\Branch\Domain\Policies;

use Modules\Iam\Branch\Domain\Entities\Branch;
use Modules\Iam\Branch\Domain\Exceptions\MainBranchAlreadyExistsException;

final class BranchPolicy
{
    /**
     * @param iterable<Branch> $branches
     */
    public function ensureOnlyOneMainBranch(iterable $branches): void
    {
        foreach ($branches as $branch) {
            if ($branch->isMain()) {
                throw new MainBranchAlreadyExistsException();
            }
        }
    }
}