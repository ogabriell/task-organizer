<!DOCTYPE html>
<?php
include_once "acao.php";
$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
$dados;
if ($acao == 'editar'){
    $cod = isset($_GET['cod']) ? $_GET['cod'] : "";
    if ($cod > 0)
        $dados = buscarDados($cod);
}
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>

<nav>
    <div class="nav-wrapper indigo grey darken-4">
        <a href="index.php" class="brand-logo center">Index</a>
        <ul class="left hide-on-med-and-down">
        <li><a href="cad.php">Novo</a></li>
        </ul>
        <ul class="right hide-on-med-and-down" style="margin-right:10px;">
        <li><?php?></li>
        </ul>
    </div>
</nav>
<div class="container">

<form action="acao.php" method="post" style="margin:15px 0px 0px 0px;">
    <input readonly style="display:none;" type="text" name="cod" id="cod" value="<?php if ($acao == "editar") echo $dados['cod']; else echo 0; ?>">
    <div class="row">
        <div class="col s6">
            <input required=true  autocomplete="off"   placeholder="Nome" type="text" name="nome" id="nome" value="<?php if ($acao == "editar") echo $dados['nome']; ?>">
        </div>
        <div class="col s6">
            <input required=true  autocomplete="on"   placeholder="Materia" type="text" name="materia" id="materia" value="<?php if ($acao == "editar") echo $dados['materia']; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <textarea required=true  autocomplete="off" id="descricao" name="descricao" class="materialize-textarea" placeholder="Descrição"><?php if ($acao == "editar") echo $dados['descricao']; ?></textarea>
    <!-- <input required=true  autocomplete="off"   placeholder="Descrição" type="text" name="descricao" id="descricao" value="<?php if ($acao == "editar") echo $dados['descricao']; ?>"><br> -->
        </div>
    </div>
    <div class="row">
        <div class="col s6">
            <input                autocomplete="off"   placeholder="Nota" type="text" name="nota" id="nota" value="<?php if ($acao == "editar") echo $dados['nota']; ?>">
        </div>
        <div class="col s4">
            <input required=true  autocomplete="off"   placeholder="Entrega" type="date" name="entrega" id="entrega" value="<?php if ($acao == "editar") echo $dados['entrega']; ?>">
        </div>
        <div class="col s2">
            <button class="waves-effect waves-light btn-large light-blue lighten-1" type="submit" name="acao" id="acao" value="salvar"><i class="material-icons left">send</i>Enviar</button>
</form>
        </div>
    </div>
<?php
?>
</div>
</body>
</html>