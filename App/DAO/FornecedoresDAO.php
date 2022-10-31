<?php 

namespace App\DAO;
use App\Models\FornecedoresModel;
use App\DAO\IndexDAO;

class FornecedoresDAO extends Conexao {
    
    public function __construct(){
        parent::__construct();
    }
    
    public function getAllFornecedores(): array{
        $tabela = 'fornecedores';
        $index = new IndexDAO();

        $fornecedores = $index->getAllDados($tabela);
        return $fornecedores;
    }

    public function getFornecedor(FornecedoresModel $fornecedor): array{
        $tabela = array( 
            'tabela' => 'fornecedores',
            'id' => $fornecedor->getId()
        );
        $index = new IndexDAO();

        $fornecedor = $index->getDado($tabela);
        return $fornecedor;
    }

    public function insertFornecedor(FornecedoresModel $fornecedor): void {
        $statement = $this->pdo
            ->prepare('INSERT INTO fornecedores VALUES(
                null,
                :nome,
                :email,
                :telefone
            );');
        $statement->execute([
            'nome' => $fornecedor->getNome(),
            'email' => $fornecedor->getEmail(),
            'telefone' => $fornecedor->getTelefone(),
        ]);
    }
    
    public function updateFornecedor(FornecedoresModel $fornecedor): void {
        $statement = $this->pdo
            ->prepare('UPDATE fornecedores 
                SET nome = :nome,
                    email = :email,
                    telefone = :telefone
                where id = :id');
        $statement->execute([
            'id' => $fornecedor->getId(),
            'nome' => $fornecedor->getNome(),
            'email' => $fornecedor->getEmail(),
            'telefone' => $fornecedor->getTelefone(),
        ]);
    }
    
    public function deleteFornecedor(FornecedoresModel $fornecedor): void {
        $tabela = array( 
            'tabela' => 'fornecedores',
            'id' => $fornecedor->getId()
        );
        $index = new IndexDAO();
        $index->deleteDado($tabela);
    }
}