<?php

namespace Modules\Iam\Branch\Application\Branch\DTOs;

final class FindBranchByNameDto
{
    public function __construct(
        public string $name
    ) {}
}