<?php

interface ClienteInterface
{

    public function setId(int $id);

    public function setNome($nome);

    public function setEndereco($endereco);

    public function setCep($cep);

    public function setNumero($numero);

    public function setComplemento($complemento);

    public function setBairro($bairro);

    public function setCidade($cidade);

    public function setUf($uf);

    public function setDtNacimento($dt_nascimento);

    public function setSexo($sexo);


    public function getId();

    public function getEndereco();

    public function getNome();

    public function getCep();

    public function getNumero();

    public function getComplemento();

    public function getBairro();

    public function getCidade();

    public function getUf();

    public function getDtNascimento();

    public function getSexo();


}
