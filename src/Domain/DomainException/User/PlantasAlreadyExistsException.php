<?php

declare(strict_types=1);

namespace App\Domain\DomainException\Plantas;

use App\Domain\DomainException\DomainRecordConflictException;

class PlantasAlreadyExistsException extends DomainRecordConflictException
{
    public $message = 'la planta ya existe.';
}
