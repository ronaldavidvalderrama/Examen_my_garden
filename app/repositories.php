<?php

declare(strict_types=1);

use App\Domain\Repository\UserRepository;
use App\Domain\Repository\PlantasRepository;
use App\Infrastructure\Persistence\User\ElloquentUserRepository;
use App\Infrastructure\Persistence\Plantas\ElloquentPlantasRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(ElloquentUserRepository::class),
        PlantasRepository::class => \DI\autowire(ElloquentPlantasRepository::class),
    ]);
};
