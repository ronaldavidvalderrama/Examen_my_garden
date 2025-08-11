<?php

namespace App\Application\UseCase\User;

use App\Application\Dtos\Contracts\ArraySerializableDto;
use App\Application\UseCase\Contracts\ActionUseCase;
use App\Domain\Repository\PlantasRepository;

class FindPlantasUseCase implements ActionUseCase
{
    public function __construct(private readonly PlantasRepository $repository) {}

    /**
     * @param ?ArraySerializableDto $dto
     * @return mixed
     */
    public function __invoke(?ArraySerializableDto $dto = null)
    {
        return $this->repository->findPlantasOfId($dto->toArray()['id']);
    }
}
