<?php

namespace Modules\Iam\Branch\Domain\ValueObjects;

class BranchPhone
{
    private string $phone;

    public function __construct(string $phone)
    {
        $this->validate($phone);
        $this->phone = $phone;
    }

    // Validaciones basicas para el teléfono de la sucursal
    // Modificar a futuro para agregar mas validaciones
    private function validate(string $phone): void
    {
        if (empty($phone)) {
            throw new \InvalidArgumentException('El teléfono no puede estar vacío.');
        }

        if (!preg_match('/^\+?[0-9]{7,15}$/', $phone)) {
            throw new \InvalidArgumentException('El teléfono debe contener entre 7 y 15 dígitos y puede comenzar con un +.');
        }
    }

    // Método para obtener el valor del teléfono
    public function getValue(): string
    {
        return $this->phone;
    }
}