<?php 

namespace App\DAO;

use App\Models\TokensModel;

class TokensDAO extends Conexao {

    public function __construct(){

        parent::__construct();

    }

    public function createToken(TokensModel $token): void{

        $statement = $this->pdo
        ->prepare('INSERT INTO tokens 
            (
            token, 
            refresh_token, 
            expired_at, 
            usuarios_id
            ) 
            VALUES 
            (
                :token, 
                :refresh_token, 
                :expired_at, 
                :usuario_id
            )');
        $statement->execute([
            'token'=> $token->getToken(),
            'refresh_token'=> $token->getRefresh_token(),
            'expired_at'=> $token->getExpired_at(),
            'usuario_id'=> $token->getUsuarios_id()
        ]);

    }
}
