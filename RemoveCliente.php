<?php

require_once "Db.php";
require_once "Cliente.php";
require_once "ClienteCrud.php";
require_once "Config.php";

$conn = Config::getBanco();

$c = new Cliente;

$c->getId();

$res = new ClienteCrud($conn, $c);

if (!$_POST) {
    echo "ERROR";
} else {
    $id = trim($_POST['id']);
    $res->remover($id);
    header('Location: index.php');
    exit;
}