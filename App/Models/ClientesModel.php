<?php

namespace App\Models;

final class ClientesModel {
   
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
    private $preco;
    
    /** 
    * @var string
    */
    private $precoVisual;
    
    /** 
    * @var string
    */
    private $cep;
    
    /** 
    * @var string
    */
    private $rua;
    
    /** 
    * @var string
    */
    private $numeroIMO;
    
    /** 
    * @var string
    */
    private $bairro;
    
    /** 
    * @var string
    */
    private $cidade;
    
    /** 
    * @var string
    */
    private $uf;
    
    /** 
    * @var string
    */
    private $cnpj;
    
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
    public function getPreco(): string{
        return $this->preco;
    }

    /** 
    * @return string
    */
    public function getPrecoVisual(): string{
        return $this->precoVisual;
    }

    /** 
    * @return string
    */
    public function getCep(): string{
        return $this->cep;
    }

    /** 
    * @return string
    */
    public function getRua(): string{
        return $this->rua;
    }

    /** 
    * @return string
    */
    public function getNumeroIMO(): string{
        return $this->numeroIMO;
    }

    /** 
    * @return string
    */
    public function getBairro(): string{
        return $this->bairro;
    }

    /** 
    * @return string
    */
    public function getCidade(): string{
        return $this->cidade;
    }

    /** 
    * @return string
    */
    public function getUf(): string{
        return $this->uf;
    }

    /** 
    * @return string
    */
    public function getCnpj(): string{
        return $this->cnpj;
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
    public function setId(int $id): ClientesModel{
        $this->id = $id;
        return $this;
    }

    /** 
    * @param string $nome
    * @return string
    */
    public function setNome(string $nome): ClientesModel{
       $this->nome = $nome;
       return $this;
    }

    /** 
    * @param string $preco
    * @return string
    */
    public function setPreco(string $preco): ClientesModel{
       $this->preco = $preco;
       return $this;
    }

    /** 
    * @param string $preco
    * @return string
    */
    public function setPrecoVisual(string $precoVisual): ClientesModel{
       $this->precoVisual = $precoVisual;
       return $this;
    }

    /** 
    * @param string $cep
    * @return string
    */
    public function setCep(string $cep): ClientesModel{
       $this->cep = $cep;
       return $this;
    }

    /** 
    * @param string $rua
    * @return string
    */
    public function setRua(string $rua): ClientesModel{
       $this->rua = $rua;
       return $this;
    }

    /** 
    * @param string $numeroIMO
    * @return string
    */
    public function setNumeroIMO(string $numeroIMO): ClientesModel{
       $this->numeroIMO = $numeroIMO;
       return $this;
    }

    /** 
    * @param string $bairro
    * @return string
    */
    public function setBairro(string $bairro): ClientesModel{
       $this->bairro = $bairro;
       return $this;
    }

    /** 
    * @param string $cidade
    * @return string
    */
    public function setCidade(string $cidade): ClientesModel{
       $this->cidade = $cidade;
       return $this;
    }

    /** 
    * @param string $uf
    * @return string
    */
    public function setUf(string $uf): ClientesModel{
       $this->uf = $uf;
       return $this;
    }

    /** 
    * @param string $cnpj
    * @return string
    */
    public function setCnpj(string $cnpj): ClientesModel{
       $this->cnpj = $cnpj;
       return $this;
    }

    /** 
    * @param string $email 
    * @return string
    */
    public function setEmail(string $email): ClientesModel{
        $this->email = $email;
        return $this;
    }

    /**
    * @param string $telefone  
    * @return string
    */
    public function setTelefone(string $telefone): ClientesModel{
         $this->telefone = $telefone;
         return $this;
    }
}