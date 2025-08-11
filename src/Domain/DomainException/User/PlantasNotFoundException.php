<?php

declare(strict_types=1);

namespace App\Domain\DomainException\Plantas;

use App\Domain\DomainException\DomainRecordNotFoundException;

class PlantasNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'La planta que esta buscando no existe.';
}
