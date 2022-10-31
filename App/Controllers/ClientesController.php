<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\DAO\ClientesDAO;
use App\Models\ClientesModel;

final class ClientesController{

    public function getClientes(Request $request, Response $response, array $args): Response{
        
        $clientesDAO = new ClientesDAO();

        $clientes = $clientesDAO->getAllClientes();
        $response = $response->withJson($clientes);

        return $response;
    }

    public function getClienteById(Request $request, Response $response, array $args): Response{
        
        $data = $request->getParsedBody();

        $clientesDAO = new ClientesDAO();
        $cliente = new ClientesModel();

        if(empty($data['id'])){
            
            $response = $response->withJson([
                'message' => 'necessario preencher o campo id!'
            ]);
            return $response;
            
        } else {

            $cliente->setId($data['id']);
        }

        $clientes = $clientesDAO->getCliente($cliente);
        $response = $response->withJson($clientes);

        return $response;
    }
    
    public function insertCliente(Request $request, Response $response, array $args){
        
        $data = $request->getParsedBody();

        $clientesDAO = new ClientesDAO();
        $cliente = new ClientesModel();

        if(empty($data['nome']) || empty($data['preco']) || empty($data['cep']) || empty($data['numeroIMO']) || empty($data['cnpj']) || empty($data['email']) || empty($data['telefone'])){
            
            $response = $response->withJson([
                'message' => 'necessario preencher todos os campos!'
            ]);
            return $response;
            
        } else {

            $cliente->setNome($data['nome']);
            $cliente->setEmail($data['email']);
            $cliente->setCep($data['cep']);
            $cliente->setPreco($data['preco']);
            $cliente->setPrecoVisual($data['precoVisual']);
            $cliente->setRua($data['rua']);
            $cliente->setNumeroIMO($data['numeroIMO']);
            $cliente->setBairro($data['bairro']);
            $cliente->setCidade($data['cidade']);
            $cliente->setUf($data['uf']);
            $cliente->setCnpj($data['cnpj']);
            $cliente->setTelefone($data['telefone']);

        }
    
        $clientesDAO->insertCliente($cliente);

        $response = $response->withJson([
            'message' => 'cliente inserido com sucesso!'
        ]);

        return $response;
    }
    
    public function updateCliente(Request $request, Response $response, array $args): Response{
        
        $data = $request->getParsedBody();

        $clientesDAO = new ClientesDAO();
        $cliente = new ClientesModel();

        if(empty($data['id']) || empty($data['nome']) || empty($data['email']) || empty($data['telefone'])){
            
            $response = $response->withJson([
                'message' => 'necessario preencher todos os campos!'
            ]);
            return $response;
            
        } else {

            $cliente->setId($data['id']);
            $cliente->setNome($data['nome']);
            $cliente->setEmail($data['email']);
            $cliente->setTelefone($data['telefone']);

        }
    

        $clientesDAO->updateCliente($cliente);

        $response = $response->withJson([
            'message' => 'cliente atualizado com sucesso!'
        ]);

        return $response;
    }
    
    public function deleteCliente(Request $request, Response $response, array $args): Response{
        
        $data = $request->getParsedBody();

        $clientesDAO = new ClientesDAO();
        $cliente = new ClientesModel();

        $cliente->setId($data['id']);
        $clientesDAO->deleteCliente($cliente);
        $response = $response->withJson([
            'message' => 'cliente deletado com sucesso!'
        ]);
        
        return $response;
    }
    
}