<?php

require_once "Db.php";
require_once "Cliente.php";
require_once "ClienteCrud.php";
require_once "Config.php";

$conn = Config::getBanco();

$c = new Cliente;

if (!$_POST) {
    echo("<script >
    window.alert('Erro ao cadastrar');
    window.location.href='cadastroCliente.php';
    </script>");
} else {

//    echo $_POST['nome'];
//    echo $_POST['cep'];
//    echo $_POST['endereco'];
//    echo $_POST['numero'];
//    echo $_POST['bairro'];
//    echo $_POST['complemento'];
//    echo $_POST['cidade'];
//    echo $_POST['uf'];
//    echo $_POST['sexo'];
//    echo $_POST['dt_nascimento'];


    $c->setNome($_POST['nome'])->setCep($_POST['cep'])->setEndereco($_POST['endereco'])->setNumero($_POST['numero'])->setBairro($_POST['bairro'])->setComplemento($_POST['complemento'])->setCidade($_POST['cidade'])->setUf($_POST['uf'])->setSexo($_POST['sexo'])->setDtNacimento($_POST['dt_nascimento']);

        $res = new ClienteCrud($conn, $c);

        $id = trim($_POST['id']);

        if ($id) {

            $res->editar($id);
        } else {

            $res->salvar();

        }

        header('Location: index.php');
        exit;

}