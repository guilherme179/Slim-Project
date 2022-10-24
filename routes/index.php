<?php   

use function src\slimConfiguration;
use App\Controllers\ClientesController;
use App\Controllers\AuthController;

$app = new \Slim\App(slimConfiguration());


$app->post('/login', AuthController::class . ':login');

$app->get('/clientes', ClientesController::class . ':getClientes');
$app->post('/clientes', ClientesController::class . ':insertCliente');
$app->put('/clientes', ClientesController::class . ':updateCliente');
$app->delete('/clientes', ClientesController::class . ':deleteCliente');


$app->run();