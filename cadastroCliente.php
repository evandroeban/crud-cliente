<?php
$id = "";
$nome = "";
$cep = "";
$endereco = "";
$numero = "";
$complemento = "";
$bairro = "";
$cidade = "";
$uf = "";
$dt_nascimento = "";
$sexo = "";

if ($_POST) {

    $idAlteracao = trim($_POST['id']);
    require_once "Db.php";
    require_once "Cliente.php";
    require_once "ClienteCrud.php";
    require_once "Config.php";

    $conn = Config::getBanco();

    $c = new Cliente;

    $res = new ClienteCrud($conn, $c);

    $array = [$res->carregar($idAlteracao)];

    foreach ($array as $value) {
        $nome = $value['nome'];
        $cep = $value['cep'];
        $endereco = $value['endereco'];
        $numero = $value['numero'];
        $complemento = $value['complemento'];
        $bairro = $value['bairro'];
        $cidade = $value['cidade'];
        $uf = $value['uf'];
        $dt_nascimento = $value['dt_nascimento'];
        $sexo = $value['sexo'];
        $id = $value['id'];
    }

}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">

        function limpa_formulário_cep() {

            document.getElementById('endereco').value = ("");
            document.getElementById('bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('uf').value = ("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {

                document.getElementById('endereco').value = (conteudo.logradouro);
                document.getElementById('bairro').value = (conteudo.bairro);
                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('uf').value = (conteudo.uf);
            } else {

                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {


            var cep = valor.replace(/\D/g, '');

            if (cep != "") {

                var validacep = /^[0-9]{8}$/;

                if (validacep.test(cep)) {

                    document.getElementById('endereco').value = "...";
                    document.getElementById('bairro').value = "...";
                    document.getElementById('cidade').value = "...";
                    document.getElementById('uf').value = "...";

                    var script = document.createElement('script');

                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback'


                    document.body.appendChild(script);

                } else {

                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {

                limpa_formulário_cep();
            }
        };

    </script>
</head>
<body>

<div class="container">
    <h2>Cadastro de Clientes</h2>
    <form action="AdicionaCliente.php" method="post">
        <div class="form-group">
            <label for="pwd">CEP</label><span style="color: red"> *Você pode preencher seus dados infomando o CEP</span>
            <input type="text" class="form-control" id="cep" onblur="pesquisacep(this.value)"
                   placeholder=" Digite o cep" name="cep" value="<?php echo $cep ?>">
        </div>
        <div class="form-group">
            <label for="pwd">Endereço</label>
            <input type="text" class="form-control" id="endereco" placeholder="Digite o endereço" name="endereco"
                   value="<?php echo $endereco ?>">
        </div>
        <div class="form-group">
            <label for="pwd">Número</label>
            <input type="text" class="form-control" id="numero" placeholder="Digite o número" name="numero"
                   value="<?php echo $numero ?>">
        </div>
        <div class="form-group">
            <label for="pwd">Complemento</label>
            <input type="text" class="form-control" id="complemento" placeholder="Digite o complemento"
                   name="complemento" value="<?php echo $complemento ?>">
        </div>
        <div class="form-group">
            <label for="pwd">Bairro</label>
            <input type="text" class="form-control" id="bairro" placeholder="Digite o bairro" name="bairro"
                   value="<?php echo $bairro ?>">
        </div>
        <div class="form-group">
            <label for="pwd">Cidade</label>
            <input type="text" class="form-control" id="cidade" placeholder="Digite a cidade" name="cidade"
                   value="<?php echo $cidade ?>">
        </div>
        <div class="form-group">
            <label for="pwd">Estado</label>
            <input type="text" class="form-control" id="uf" placeholder="Digite o estado" name="uf"
                   value="<?php echo $uf ?>">
        </div>
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" value="<?php echo $nome ?>" placeholder="Digite o nome"
                   required name="nome">
        </div>
        <div class="form-group">
            <label for="nome">Data de Nascimento:</label>
            <input type="text" class="form-control" id="dt_nascimento" value="<?php echo $dt_nascimento ?>"
                   placeholder="DD/MM/AAAA"
                   maxlength="10"
                   required name="dt_nascimento">
        </div>
        <div class="form-group">
            <label for="nome">Sexo</label>
            <input type="radio" name="sexo"
                <?php if (isset($sexo) && $sexo == "f") echo "checked"; ?>
                   value="f"> Feminino
            <input type="radio" name="sexo"
                <?php if (isset($sexo) && $sexo == "m") echo "checked"; ?>
                   value="m"> Masculino
            <input type="radio" name="sexo"
                <?php if (isset($sexo) && $sexo == "o") echo "checked"; ?>
                   value="o"> Outro

        </div>

        <input type="hidden" name="id" value="<?php echo $id ?>">

        <?php if (!$id) { ?>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <button type="reset" class="btn btn-default">Limpar</button>
        <?php } else { ?>
            <button type="submit" class="btn btn-primary">Alterar</button>
        <?php } ?>

        <a href="././index.php" class="btn btn-info" role="button">Voltar</a>
    </form>
</div>

</body>
</html>


