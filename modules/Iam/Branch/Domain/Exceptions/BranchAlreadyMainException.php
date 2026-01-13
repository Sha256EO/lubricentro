<?php

namespace Modules\Iam\Branch\Domain\Exceptions;

use Exception;

class BranchAlreadyMainException extends Exception
{
    private const MESSAGE = 'La sucursal ya es la principal.';

    public function __construct()
    {
        parent::__construct(self::MESSAGE);
    }
}