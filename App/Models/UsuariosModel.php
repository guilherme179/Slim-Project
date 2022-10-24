<?php

namespace App\Models;

final class UsuariosModel {
   
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
    private $senha;

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
    public function getSenha(): string{
        return $this->senha;
    }

    /** 
    * @param int $id
    * @return int
    */
    public function setId(int $id): UsuariosModel{
        $this->id = $id;
        return $this;
    }

    /** 
    * @param string $nome
    * @return string
    */
    public function setNome(string $nome): UsuariosModel{
       $this->nome = $nome;
       return $this;
    }

    /** 
    * @param string $email 
    * @return string
    */
    public function setEmail(string $email): UsuariosModel{
        $this->email = $email;
        return $this;
    }

    /**
    * @param string $senha  
    * @return string
    */
    public function setSenha(string $senha): UsuariosModel{
         $this->senha = $senha;
         return $this;
    }
}