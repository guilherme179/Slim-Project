<?php   

use Slim\Factory\AppFactory;
use function src\slimConfiguration;
use App\Controllers\ClienteController;

$app = new \Slim\App(slimConfiguration());
$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);


$app->get('/', ClienteController::class . ':getClientes');


$app->run();