<?php

namespace Modules\Iam\Branch\Application\Branch\Exceptions;

use Exception;

class CannotDeleteMainBranchException extends Exception
{
    private const MESSAGE = "No se puede eliminar la sucursal principal.";

    public function __construct()
    {
        parent::__construct(self::MESSAGE);
    }
}