<?php

namespace App\Controllers;

use App\DAO\TokensDAO;
use App\DAO\UsuariosDAO;
use Firebase\JWT\JWT;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use function src\generateToken;

final class AuthController{

    public function login(Request $request, Response $response, array $args): Response{
        
        $data = $request->getParsedBody();
        $email = $data['email'];
        $senha = $data['senha'];

        $usuariosDAO = new UsuariosDAO();
        $usuario = $usuariosDAO->getUserByEmail($email);

        if(is_null($usuario))
            return $response->withStatus(401);

        if(!password_verify($senha, $usuario->getSenha()))
            return $response->withStatus(401);

        $usuarioArray = [
            "id" => $usuario->getId(),
            "nome" => $usuario->getNome(),
            "email" => $usuario->getEmail(),
        ];

        $token = generateToken($usuarioArray);

        $response = $response->withJson([
            "token" => $token['token'],
            "refresh_token" => $token['refresh_token']
        ]);

        return $response;
        
    }
    
    public function refreshToken(Request $request, Response $response, array $args): Response{

        $data = $request->getParsedBody();
        $refreshToken = $data['refresh_token'];

        $refreshTokenDecoded = JWT::decode(
            $refreshToken,
            getenv('JWT_SECRET_KEY'),
            ['HS256']
        );
        
        $TokensDAO = new TokensDAO();
        $refreshTokenExists = $TokensDAO->verifyRefreshToken($refreshToken); 
        
        if(!$refreshTokenExists)
            return $response->withStatus(401);

        $usuariosDAO = new UsuariosDAO();
        $usuario = $usuariosDAO->getUserByEmail($refreshTokenDecoded->email);

        if(is_null($usuario))
            return $response->withStatus(401);

        $usuarioArray = [
            "id" => $usuario->getId(),
            "nome" => $usuario->getNome(),
            "email" => $usuario->getEmail(),
        ];

        $token = generateToken($usuarioArray);

        $response = $response->withJson([
            "token" => $token['token'],
            "refresh_token" => $token['refresh_token']
        ]);

        return $response;
    }
    
}