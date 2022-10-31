<?php

namespace App\Models;

final class FornecedoresModel {
   
    /** 
    * @var int
    */
    private $id;
    
    /** 
    * @var string
    */
    private $nome;
    
    /** 
    * @var string
    */
    private $email;
    
    /** 
    * @var string
    */
    private $telefone;

    /** 
    * @return int
    */
    public function getId(): int{
        return $this->id;
    }

    /** 
    * @return string
    */
    public function getNome(): string{
        return $this->nome;
    }

    /** 
    * @return string
    */
    public function getEmail(): string{
        return $this->email;
    }

    /** 
    * @return string
    */
    public function getTelefone(): string{
        return $this->telefone;
    }

    /** 
    * @param int $id
    * @return int
    */
    public function setId(int $id): FornecedoresModel{
        $this->id = $id;
        return $this;
    }

    /** 
    * @param string $nome
    * @return string
    */
    public function setNome(string $nome): FornecedoresModel{
       $this->nome = $nome;
       return $this;
    }

    /** 
    * @param string $email 
    * @return string
    */
    public function setEmail(string $email): FornecedoresModel{
        $this->email = $email;
        return $this;
    }

    /**
    * @param string $telefone  
    * @return string
    */
    public function setTelefone(string $telefone): FornecedoresModel{
         $this->telefone = $telefone;
         return $this;
    }
}