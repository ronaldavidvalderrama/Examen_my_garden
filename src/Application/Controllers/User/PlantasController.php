<?php

declare(strict_types=1);

namespace App\Application\Controllers\Plantas;

use App\Application\Dtos\Planta\FilterPlantasDto;
use App\Application\Dtos\Planta\FindPlantaDto;
use App\Application\Dtos\Plantas\PatchPlantasDto;
use App\Application\Dtos\Plantas\PlantasDto;
use App\Application\Http\Traits\ApiResponseTrait;
use App\Application\UseCase\User\CreatePlantasUseCase;
use App\Application\UseCase\User\DeletePlantasUseCase;
use App\Application\UseCase\User\FindPlantasUseCase;
use App\Application\UseCase\User\GetAllPlantasUseCase;
use App\Application\UseCase\User\UpdatePlantasUseCase;
use App\Domain\Repository\plantasRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PlantasController
{
    use ApiResponseTrait;

    public function __construct(private readonly plantasRepository $PlantasRepository) {}

    /**
     * @return mixed
     */
    public function index(Request $request, Response $response)
    {
        $dto = new FilterPlantasDto($request->getQueryParams());
        $useCase = new GetAllPlantasUseCase($this->PlantasRepository);
        return $this->successResponse($response, $useCase($dto));
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    public function findById(Request $request, Response $response, array $args)
    {
        $dto = new FindPlantaDto($args);
        $useCase = new FindPlantasUseCase($this->PlantasRepository);
        return $this->successResponse($response, $useCase($dto));
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    public function create(Request $request, Response $response)
    {
        $dto = new PlantasDto($request->getParsedBody());
        $useCase = new CreatePlantasUseCase($this->PlantasRepository);
        return $this->successResponse($response, $useCase($dto));
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    public function update(Request $request, Response $response, array $args)
    {
        $dto = new PatchPlantasDto(array_merge($request->getParsedBody(), $args));
        $useCase = new UpdatePlantasUseCase($this->PlantasRepository);
        return $this->successResponse($response, $useCase($dto));
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    public function delete(Request $request, Response $response, array $args)
    {
        $dto = new FindPlantaDto($args);
        $useCase = new DeletePlantasUseCase($this->PlantasRepository);
        return $this->successResponse($response, $useCase($dto));
    }
}
