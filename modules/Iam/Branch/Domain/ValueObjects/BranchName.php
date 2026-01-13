<?php

namespace Modules\Iam\Branch\Domain\ValueObjects;

class BranchName
{
    private string $name;

    public function __construct(string $name)
    {
        $this->validate($name);
        $this->name = $name;
    }

    /**
     * Validaciones basicas para el nombre de la sucursal
     */
    private function validate(string $name): void
    {
        if (empty($name)) {
            throw new \InvalidArgumentException("El nombre de la sucursal no puede estar vacío.");
        }

        if (strlen($name) > 100) {
            throw new \InvalidArgumentException("El nombre de la sucursal no puede exceder los 100 caracteres.");
        }

        if (strlen($name) < 3) {
            throw new \InvalidArgumentException("El nombre de la sucursal debe tener al menos 3 caracteres.");
        }

        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $name)) {
            throw new \InvalidArgumentException("El nombre de la sucursal solo puede contener letras, números y espacios.");
        }
    }

    /**
     * Obtiene el valor del nombre de la sucursal
     */
    public function getValue(): string
    {
        return $this->name;
    }
}