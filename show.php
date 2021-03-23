<!DOCTYPE html>
<?php 
     include_once "conf/default.inc.php";
     require_once "conf/Conexao.php";
     $title = "Lista de Clientes";
     $id = isset($_GET['id']) ? $_GET['id'] : "1";

?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        function excluirRegistro(url){
            if (confirm("Deseja realmente excluir?"))
                location.href = url; 
        }
    </script>
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


</br></br>
<?php
    $sql = "SELECT * FROM trabalho WHERE cod = $id";
    $pdo = Conexao::getInstance(); 
    $consulta = $pdo->query($sql);
    while ($linha = $consulta->fetch(PDO::FETCH_BOTH)){ 
?>
    <div class="row">
        <div class="col s9">
            <h1 style="margin:-5px 0px 0px 0px;"><?php echo $linha['nome']; ?></h1>
        </div>
        <div class="col s3">
            <a href="cad.php?acao=editar&cod=<?php echo $id;?>"><button class="btn-flat"><i class="material-icons left">create</i>Alterar</button></a>
            <a href="acao.php?entrega=<?php echo $id;?>"><button class="btn-flat"><i class="material-icons left">send</i>Entregar</button></a>
            <a href="javascript:excluirRegistro('acao.php?acao=excluir&cod=<?php echo $_GET['id'];?>')"><button class="btn-flat"><i class="material-icons left">close</i>Excluir</button></a>

        </div>
    </div>
    <div class="row">
        <div class="col s12" style="margin-top:-50px;">
            <h6 style="margin:-5px 0px 0px 0px;"><?php echo $linha['materia'].' - Entrega dia: '; echo date_format(date_create($linha['entrega']),"d/m/Y");?></h6>
        </div>
    <div class="row">
        <div class="col s9" style="margin-top:-40px;">
            <h6><b><?php echo $linha['nota'] ?>/100</b></h6>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <pre style="font-size:20px; margin-top:-10px;"><?php echo $linha['descricao'] ?></pre>
        </div>
    </div>
        <!-- echo "Código: {$linha['cod']} - Nome: {$linha['nome']} - Descrição: {$linha['descricao']} - Materia: {$linha['materia']} - Nota: {$linha['nota']} - Entrega: {$linha['entrega']} - Entregue: {$linha['entregue']}<br />"; -->
<?php } ?>
</div>
</body>
</html>