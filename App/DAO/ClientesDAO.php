<?php 

namespace App\DAO;
use App\Models\ClientesModel;

class ClientesDAO extends Conexao {

    public function __construct(){
        parent::__construct();
    }

    public function getAllClientes(): array{
        $clientes = $this->pdo
        ->query('SELECT * FROM clientes')
        ->fetchAll(\PDO::FETCH_ASSOC);

        return $clientes;
    }

    public function getCliente(ClientesModel $cliente): array{
        $statement = $this->pdo
        ->prepare('SELECT * FROM clientes WHERE id = :id;');
        $statement->execute([
            'id' => $cliente->getId()
        ]);
        $clienteId = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $clienteId;
    }

    public function insertCliente(ClientesModel $cliente): void {
        $statement = $this->pdo
            ->prepare('INSERT INTO clientes VALUES(
                null,
                :nome,
                :email,
                :telefone
            );');
        $statement->execute([
            'nome' => $cliente->getNome(),
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
        $statement = $this->pdo
            ->prepare('DELETE FROM clientes 
                where id = :id');
        $statement->execute([
            'id' => $cliente->getId()
        ]);
    }
}