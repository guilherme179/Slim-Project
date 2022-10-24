<?php

namespace App\Controllers;

use App\DAO\TokensDAO;
use App\DAO\UsuariosDAO;
use App\Models\TokensModel;
use Firebase\JWT\JWT;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

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

        $expiredAt = (new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')))->modify('+2 days')->format('Y-m-d H:i:s');

        $tokenPayLoad = [
            'sub' => $usuario->getId(),
            'name' => $usuario->getNome(),
            'email' => $usuario->getEmail(),
            'expired_at' => $expiredAt
        ];

        $token = JWT::encode($tokenPayLoad, getenv('JWT_SECRET_KEY'), 'HS256');
        $refreshTokenPayLoad = [
            'email' => $usuario->getEmail()
        ];
        $refreshToken = JWT::encode($refreshTokenPayLoad, getenv('JWT_SECRET_KEY'), 'HS256');

        $tokenModel = new TokensModel();
        $tokenModel->setExpired_at($expiredAt);        
        $tokenModel->setRefresh_token($refreshToken);        
        $tokenModel->setToken($token);        
        $tokenModel->setUsuarios_id($usuario->getId());        
        
        $tokensDAO = new TokensDAO();
        $tokensDAO->createToken($tokenModel);

        $response = $response->withJson([
            "token" => $token,
            "refresh_token" => $refreshToken,
        ]);

        return $response;
    }
    
    public function logoff(Request $request, Response $response, array $args): Response{


        $response = $response->withJson([
            'message' => 'cliente inserido com sucesso!'
        ]);

        return $response;
    }
    
}