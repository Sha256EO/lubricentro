<?php

namespace Modules\Iam\Branch\Application\Branch\Mapper;

use Modules\Iam\Branch\Application\Branch\DTOs\BranchCollertorDto;
use Modules\Iam\Branch\Application\Branch\DTOs\BranchResponseDto;
use Modules\Iam\Branch\Domain\Entities\Branch;

final class BranchMapper
{
    public static function toDto(Branch $branch): BranchResponseDto
    {
        return new BranchResponseDto(
            id: $branch->getId(),
            name: $branch->getName()->getValue(),
            address: $branch->getAddress()->getValue(),
            phone: $branch->getPhone()->getValue(),
            isMain: $branch->isMain(),
        );
    }

    public static function toCollector(iterable $branches): BranchCollertorDto
    {
        $items = [];

        foreach ($branches as $branch) {
            $items[] = self::toDto($branch);
        }

        return new BranchCollertorDto($items);
    }
}