<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class ClienteController{

    public function getClientes(Request $request, Response $response, array $args): Response
    {
        $response->getBody()->write("Hello World!");
        return $response;
    }

}