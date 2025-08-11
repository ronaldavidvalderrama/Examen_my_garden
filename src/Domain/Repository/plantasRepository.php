<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Model\Plantas\Plantas;

interface plantasRepository
{
    /**
     * @param ?array $filters
     * @return Plantas[]
     */
    public function findAll(?array $filters = null): array;

    /**
     * @param int $id
     * @return Plantas
     * @throws PlantasNotFoundException
     */
    public function findPlantasOfId(int $id): Plantas;

    /**
     * @param int $id
     * @return bool
     * @throws PlantasNotFoundException
     */
    public function deletePlantas(int $id): bool;

    /**
     * @param array $data
     * @return Plantas
     * @throws PlantasNotFoundException
     */
    public function createPlantas(array $data): Plantas;

    /**
     * @param array $data
     * @return bool
     * @throws PlantasNotFoundException
     */
    public function updatePlantas(int $id, array $data): bool;
}
