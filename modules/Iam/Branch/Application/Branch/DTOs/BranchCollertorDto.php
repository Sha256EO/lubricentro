<?php

namespace Modules\Iam\Branch\Application\Branch\DTOs;

final class BranchCollertorDto
{
    /**
     * @param BranchReponseDto[] $branches
     */
    public function __construct(
        public array $branches
    ) {}
}