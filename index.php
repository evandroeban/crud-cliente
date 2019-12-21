<?php

require_once "Db.php";
require_once "Cliente.php";
require_once "ClienteCrud.php";
require_once "Config.php";

$conn = Config::getBanco();

$c = new Cliente;

$c->getId();

$res = new ClienteCrud($conn, $c);

?>


<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>

<div class="container">
    <div class="row">
        <h2>Lista de Clientes</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Data Nascimento</th>
                <th>Sexo</th>
                <th>Opções</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sexo="";
            foreach ($res->listar() as $cliente) {

                switch ($cliente['sexo']) {
                    case "m":
                        $sexo = "Masculino";
                        break;
                    case "f":
                        $sexo = "Feminino";
                        break;
                    case "o":
                        $sexo = "Outros";
                        break;
                }


            ?>

            <tr>
                <td><?= $cliente['nome'] ?></td>
                <td><?= $cliente['dt_nascimento'] ?></td>
                <td><?= $sexo?></td>
                <td>
                    <form action="cadastroCliente.php" method="post">
                        <input type="hidden" name="id" value="<?= $cliente['id'] ?>">
                        <button class="btn btn-primary">alterar</button>
                    </form>
                </td>
                <td>
                    <form action="RemoveCliente.php" method="post" onsubmit="return submitResult();">
                        <input type="hidden" name="id" value="<?= $cliente['id'] ?>">
                        <button class="btn btn-danger">remover</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
        <!--        <button type="button" class="btn btn-primary">Novo Cliente</button>-->
        <a href="./cadastroCliente.php" class="btn btn-primary" role="button">Novo Cliente</a>
    </div>
</div>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script>
    function submitResult() {
        return confirm("Deseja realmente deletar esse registro?") !== false;
    }
</script>
</body>
</html>
