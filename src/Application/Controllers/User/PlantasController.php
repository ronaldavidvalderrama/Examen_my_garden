<?php

declare(strict_types=1);

namespace App\Application\Controllers\User;

use App\Application\Dtos\Planta\FilterPlantasDto as PlantaFilterPlantasDto;
use App\Application\Dtos\Planta\FindPlantaDto as PlantaFindPlantaDto;
use App\Application\Dtos\Plantas\PatchPlantasDto as PlantasPatchPlantasDto;
use App\Application\Dtos\Plantas\PlantasDto as PlantasPlantasDto;
use App\Application\Dtos\User\FilterPlantasDto;
use App\Application\Dtos\User\FindPlantaDto;
use App\Application\Dtos\User\PatchPlantasDto;
use App\Application\Dtos\User\PlantasDto;
use App\Application\Http\Traits\ApiResponseTrait;
use App\Application\UseCase\User\CreatePlantasUseCase;
use App\Application\UseCase\User\DeletePlantasUseCase;
use App\Application\UseCase\User\FindPlantasUseCase;
use App\Application\UseCase\User\GetAllPlantasUseCase;
use App\Application\UseCase\User\UpdatePlantasUseCase;
use App\Domain\Repository\plantasRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController
{
    use ApiResponseTrait;

    public function __construct(private readonly plantasRepository $userRepository) {}

    /**
     * @return mixed
     */
    public function index(Request $request, Response $response)
    {
        $dto = new PlantaFilterPlantasDto($request->getQueryParams());
        $useCase = new GetAllPlantasUseCase($this->userRepository);
        return $this->successResponse($response, $useCase($dto));
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    public function findById(Request $request, Response $response, array $args)
    {
        $dto = new PlantaFindPlantaDto($args);
        $useCase = new FindPlantasUseCase($this->userRepository);
        return $this->successResponse($response, $useCase($dto));
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    public function create(Request $request, Response $response)
    {
        $dto = new PlantasPlantasDto($request->getParsedBody());
        $useCase = new CreatePlantasUseCase($this->userRepository);
        return $this->successResponse($response, $useCase($dto));
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    public function update(Request $request, Response $response, array $args)
    {
        $dto = new PlantasPatchPlantasDto(array_merge($request->getParsedBody(), $args));
        $useCase = new UpdatePlantasUseCase($this->userRepository);
        return $this->successResponse($response, $useCase($dto));
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    public function delete(Request $request, Response $response, array $args)
    {
        $dto = new FindPlantasUseCase($args);
        $useCase = new DeletePlantasUseCase($this->userRepository);
        return $this->successResponse($response, $useCase($dto));
    }
}
