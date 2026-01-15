<?php

namespace Modules\Iam\Branch\Application\Branch\DTOs;

final class UpdateBranchDto
{
    public function __construct(
        public int $id,
        public ?string $name,
        public ?string $address,
        public ?string $phone
    ) {}
}