<?php

namespace Modules\Iam\Branch\Domain\Exceptions;

use Exception;

class MainBranchAlreadyExistsException extends Exception
{
    private const MESSAGE = 'Ya existe una sucursal principal.';

    public function __construct()
    {
        parent::__construct(self::MESSAGE);
    }
}