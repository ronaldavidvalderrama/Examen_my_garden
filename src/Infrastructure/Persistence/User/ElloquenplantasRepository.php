<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Plantas;

use App\Domain\DomainException\Plantas\PlantasAlreadyExistsException;
use App\Domain\Model\Plantas\Plantas;
use App\Domain\DomainException\Plantas\PlantasNotFoundException;
use App\Domain\Repository\PlantasRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ElloquentPlantasRepository implements PlantasRepository
{
    /**
     * {@inheritdoc}
     */
    public function findAll(?array $filters = null): array
    {
        $query = Plantas::query();

        if ($filters) {
            $query->where($filters);
        }

        return $query->get()->toArray();
    }

    /**
     * {@inheritdoc}
     */
    public function findPlantasOfId(int $id): Plantas
    {
        try {
            return Plantas::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new PlantasNotFoundException();
        }
    }


    /**
     * {@inheritdoc}
     */
    public function deletePlantas(int $id): bool
    {
        $plantas = $this->findPlantasOfId($id);
        return $plantas->delete();
    }


    /**
     * {@inheritdoc}
     */
    public function createPlantas(array $data): Plantas
    {
        $plantas = Plantas::create($data);
        if (!$plantas) {
            throw new PlantasAlreadyExistsException();
        }
        return $plantas;
    }


    /**
     * {@inheritdoc}
     */
    public function updatePlantas(int $id, array $data): bool
    {
        $plantas = $this->findPlantasOfId($id);
        return $plantas->update($data);
    }
}
