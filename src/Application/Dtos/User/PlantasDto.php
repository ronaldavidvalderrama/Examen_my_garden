<?php

declare(strict_types=1);

namespace App\Application\Dtos\Plantas;

use App\Application\Dtos\Contracts\ArraySerializableDto;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

class PlantasDto implements ArraySerializableDto
{

    /**
     * @param array $args
     */
    public function __construct(private readonly array $args)
    {
        $this->validate();
    }

    /**
     * @throws InvalidArgumentException
     */
    private function validate()
    {
        try {
            v::stringType()->length(min: 2, max: 100)->setName('nombre')->assert($this->args['nombre']);
            v::stringType()->length(min: 2, max: 20)
                ->in(['cactus', 'ornamental', 'frutal'])
                ->setName('categoria')->assert($this->args['categoria']);
            v::stringType()->length(min: 2, max: 100)->setName('familia')->assert($this->args['familia']);
            v::date()->setName('proximo_riego')->assert($this->args['proximo_riego']);
        } catch (NestedValidationException $e) {
            throw new \InvalidArgumentException($e->getFullMessage());
        }
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'nombre' => htmlspecialchars($this->args['nombre']),
            'categoria' => htmlspecialchars($this->args['categoria']),
            'familia' => htmlspecialchars($this->args['familia']),
            'proximo_riego' => htmlspecialchars($this->args['proximo_riego']),
        ];
    }
}
