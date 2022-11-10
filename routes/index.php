<?php

use function src\jwtAuth;
use function src\slimConfiguration;
use App\Controllers\ClientesController;
use App\Controllers\FornecedoresController;
use App\Controllers\AuthController;

$app = new \Slim\App(slimConfiguration());


$app->post('/login', AuthController::class . ':login');
$app->post('/refresh-token', AuthController::class . ':refreshToken');
$app->get('/teste', function(){echo "oi";});

$app->get('/clientes', ClientesController::class . ':getClientes');
$app->post('/clientes', ClientesController::class . ':insertCliente');
$app->put('/clientes', ClientesController::class . ':updateCliente');
$app->delete('/clientes', ClientesController::class . ':deleteCliente');
$app->post('/clientes/id', ClientesController::class . ':getClienteById');

$app->get('/fornecedores', FornecedoresController::class . ':getFornecedores');
$app->post('/fornecedores', FornecedoresController::class . ':insertFornecedor');
$app->put('/fornecedores', FornecedoresController::class . ':updateFornecedor');
$app->delete('/fornecedores', FornecedoresController::class . ':deleteFornecedor');
$app->post('/fornecedores/id', FornecedoresController::class . ':getFornecedorById');


$app->run();