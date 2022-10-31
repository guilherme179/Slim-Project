<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\DAO\FornecedoresDAO;
use App\Models\FornecedoresModel;

final class FornecedoresController{

    public function getFornecedores(Request $request, Response $response, array $args): Response{
        
        $fornecedoresDAO = new FornecedoresDAO();

        $fornecedores = $fornecedoresDAO->getAllFornecedores();
        $response = $response->withJson($fornecedores);

        return $response;
    }

    public function getFornecedorById(Request $request, Response $response, array $args): Response{
        
        $data = $request->getParsedBody();

        $fornecedoresDAO = new FornecedoresDAO();
        $fornecedor = new FornecedoresModel();

        if(empty($data['id'])){
            
            $response = $response->withJson([
                'message' => 'necessario preencher o campo id!'
            ]);
            return $response;
            
        } else {

            $fornecedor->setId($data['id']);
        }

        $fornecedores = $fornecedoresDAO->getFornecedor($fornecedor);
        $response = $response->withJson($fornecedores);

        return $response;
    }
    
    public function insertFornecedor(Request $request, Response $response, array $args){
        
        $data = $request->getParsedBody();

        $fornecedoresDAO = new FornecedoresDAO();
        $fornecedor = new FornecedoresModel();

        if(empty($data['nome']) || empty($data['email']) || empty($data['telefone'])){
            
            $response = $response->withJson([
                'message' => 'necessario preencher todos os campos!'
            ]);
            return $response;
            
        } else {

            $fornecedor->setNome($data['nome']);
            $fornecedor->setEmail($data['email']);
            $fornecedor->setTelefone($data['telefone']);

        }
    
        $fornecedoresDAO->insertFornecedor($fornecedor);

        $response = $response->withJson([
            'message' => 'fornecedor inserido com sucesso!'
        ]);

        return $response;
    }
    
    public function updatefornecedor(Request $request, Response $response, array $args): Response{
        
        $data = $request->getParsedBody();

        $fornecedoresDAO = new FornecedoresDAO();
        $fornecedor = new FornecedoresModel();

        if(empty($data['id']) || empty($data['nome']) || empty($data['email']) || empty($data['telefone'])){
            
            $response = $response->withJson([
                'message' => 'necessario preencher todos os campos!'
            ]);
            return $response;
            
        } else {

            $fornecedor->setId($data['id']);
            $fornecedor->setNome($data['nome']);
            $fornecedor->setEmail($data['email']);
            $fornecedor->setTelefone($data['telefone']);

        }
    

        $fornecedoresDAO->updatefornecedor($fornecedor);

        $response = $response->withJson([
            'message' => 'fornecedor atualizado com sucesso!'
        ]);

        return $response;
    }
    
    public function deletefornecedor(Request $request, Response $response, array $args): Response{
        
        $data = $request->getParsedBody();

        $fornecedoresDAO = new FornecedoresDAO();
        $fornecedor = new FornecedoresModel();

        $fornecedor->setId($data['id']);
        $fornecedoresDAO->deleteFornecedor($fornecedor);
        $response = $response->withJson([
            'message' => 'fornecedor deletado com sucesso!'
        ]);
        
        return $response;
    }
    
}