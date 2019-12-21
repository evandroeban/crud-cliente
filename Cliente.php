<?php
require_once "ClienteInterface.php";

class Cliente implements ClienteInterface
{

    private $id;
    private $nome;
    private $cep;
    private $endereco;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $uf;
    private $dt_nascimento;
    private $sexo;


    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
        return $this;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
        return $this;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
        return $this;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }

    public function setUf($uf)
    {
        $this->uf = $uf;
        return $this;
    }

    public function setDtNacimento($dt_nascimento)
    {
        $this->dt_nascimento = $dt_nascimento;
        return $this;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
        return $this;
    }

    public function getCep()
    {
        return $this->cep;
    }

   public function getEndereco()
    {
        return $this->endereco;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function getUf()
    {
        return $this->uf;
    }

    public function getDtNascimento()
    {
        return $this->dt_nascimento;
    }

    public function getSexo()
    {
        return $this->sexo;
    }
}