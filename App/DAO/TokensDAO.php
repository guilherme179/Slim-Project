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

    public function verifyRefreshToken(string $refreshToken): bool {
        
        $statement = $this->pdo->prepare(
            'SELECT id 
            FROM tokens 
            WHERE refresh_token = :refresh_token 
            AND active = 1
            ;');
        $statement->bindParam('refresh_token', $refreshToken);
        $statement->execute();
        $statement2 = $this->pdo->prepare(
            'UPDATE tokens 
            SET active = 0
            WHERE refresh_token = :refresh_token;
            ');
        $statement2->bindParam('refresh_token', $refreshToken);        
        $statement2->execute();

        $tokens = $statement->fetchAll(\PDO::FETCH_ASSOC); 

        return count($tokens) === 0 ? false : true;
    }
}
