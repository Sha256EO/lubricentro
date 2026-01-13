<?php

namespace Modules\Iam\Branch\Application\Exceptions;

use Exception;

class BranchNotFoundException extends Exception
{
    private const MESSAGE = 'Sucursal no encontrada.';

    public function __construct()
    {
        parent::__construct(self::MESSAGE);
    }
}