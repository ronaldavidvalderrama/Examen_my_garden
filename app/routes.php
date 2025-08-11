<?php

declare(strict_types=1);

use App\Application\Controllers\Plantas\PlantasController;
use App\Application\Controllers\User\UserController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hola trainer!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', [UserController::class, 'index']);
        $group->get('/{id}', [UserController::class, 'findById']);
        $group->post('', [UserController::class, 'create']);
        $group->put('/{id}', [UserController::class, 'update']);
        $group->delete('/{id}', [UserController::class, 'delete']);
    });

    $app->group('/plantas', function (Group $group) {
        $group->get('', [PlantasController::class, 'index']);
        $group->get('/{id}', [PlantasController::class, 'findById']);
        $group->post('', [PlantasController::class, 'create']);
        $group->put('/{id}', [PlantasController::class, 'update']);
        $group->delete('/{id}', [PlantasController::class, 'delete']);
    });

};
