<?php

declare(strict_types=1);

namespace App\Application\Dtos\Planta;

use App\Application\Dtos\Contracts\ArraySerializableDto;

class FilterPlantasDto implements ArraySerializableDto
{
    private const ALLOWED_KEYS = [
        'nombre',
        'categoria',
        'familia',
        'proximo_riego',
    ];

    /**
     * @param array $args
     */
    public function __construct(private readonly array $args) {}

    /**
     * @return array
     */
    public function toArray(): array
    {
        $allowedKeys = array_flip(self::ALLOWED_KEYS);
        return array_map(function ($item) {
            return htmlspecialchars($item);
        }, array_intersect_key($this->args, $allowedKeys));
    }
}
