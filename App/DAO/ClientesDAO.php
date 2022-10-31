<?php 

namespace App\DAO;
use App\Models\ClientesModel;
use App\DAO\IndexDAO;

class ClientesDAO extends Conexao {
    
    public function __construct(){
        parent::__construct();
    }
    
    public function getAllClientes(): array{
        $tabela = 'clientes';
        $index = new IndexDAO();

        $clientes = $index->getAllDados($tabela);
        return $clientes;
    }

    public function getCliente(ClientesModel $cliente): array{
        $tabela = array( 
            'tabela' => 'clientes',
            'id' => $cliente->getId()
        );
        $index = new IndexDAO();

        $cliente = $index->getDado($tabela);
        return $cliente;
    }

    public function insertCliente(ClientesModel $cliente): void {
        $statement = $this->pdo
            ->prepare('INSERT INTO clientes VALUES(
                null,
                :nome,
                :telefone,
                :preco,
                :precoVisual,
                :cep,
                :rua,
                :numeroIMO,
                :bairro,
                :cidade,
                :uf,                
                :cnpj,
                :email
            );');
        $statement->execute([
            'nome' => $cliente->getNome(),
            'preco' => $cliente->getPreco(),
            'precoVisual' => $cliente->getPrecoVisual(),
            'cep' => $cliente->getCep(),
            'rua' => $cliente->getRua(),
            'numeroIMO' => $cliente->getNumeroIMO(),
            'bairro' => $cliente->getBairro(),
            'cidade' => $cliente->getCidade(),
            'uf' => $cliente->getUf(),
            'cnpj' => $cliente->getCnpj(),
            'email' => $cliente->getEmail(),
            'telefone' => $cliente->getTelefone(),
        ]);
    }
    
    public function updateCliente(ClientesModel $cliente): void {
        $statement = $this->pdo
            ->prepare('UPDATE clientes 
                SET nome = :nome,
                    email = :email,
                    telefone = :telefone
                where id = :id');
        $statement->execute([
            'id' => $cliente->getId(),
            'nome' => $cliente->getNome(),
            'email' => $cliente->getEmail(),
            'telefone' => $cliente->getTelefone(),
        ]);
    }
    
    public function deleteCliente(ClientesModel $cliente): void {
        $tabela = array( 
            'tabela' => 'clientes',
            'id' => $cliente->getId()
        );
        $index = new IndexDAO();
        $index->deleteDado($tabela);
    }
}