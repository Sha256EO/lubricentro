<?php

namespace Modules\Iam\Branch\Application\Branch\DTOs;

final class CreateBranchDto
{
    public function __construct(
        public string $name,
        public ?string $adrress,
        public ?string $phone
    ) {}
}