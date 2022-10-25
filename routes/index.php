<?php

use function src\jwtAuth;
use function src\slimConfiguration;
use App\Controllers\ClientesController;
use App\Controllers\AuthController;

$app = new \Slim\App(slimConfiguration());


$app->post('/login', AuthController::class . ':login');
$app->post('/refresh-token', AuthController::class . ':refreshToken');
$app->get('/teste', function(){echo "oi";});

$app->get('/clientes', ClientesController::class . ':getClientes');
$app->post('/clientes', ClientesController::class . ':insertCliente');
$app->put('/clientes', ClientesController::class . ':updateCliente');
$app->delete('/clientes', ClientesController::class . ':deleteCliente');


$app->run();