<?php

namespace Modules\Iam\Branch\Domain\ValueObjects;

class BranchAddress
{
    private string $address;

    public function __construct(string $address)
    {
        $this->validate($address);
        $this->address = $address;
    }

    // Validaciones basicas para la direccion de la sucursal
    private function validate(string $address): void
    {
        if (empty($address)) {
            throw new \InvalidArgumentException('La dirección no puede estar vacía.');
        }

        if (strlen($address) < 5 || strlen($address) > 100) {
            throw new \InvalidArgumentException('La dirección debe tener entre 5 y 100 caracteres.');
        }

        if (!preg_match('/^[a-zA-Z0-9\s,.-]+$/', $address)) {
            throw new \InvalidArgumentException('La dirección solo puede contener letras, números, espacios y los caracteres , . -');
        }
    }

    // Método para obtener el valor de la dirección
    public function getValue(): string
    {
        return $this->address;
    }
}