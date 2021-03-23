<!DOCTYPE html>
<?php 
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";
$title = "Lista de Marcas";
$consulta = isset($_POST['consulta']) ? $_POST['consulta'] : "";

function entregue($data,$entregue,$tipo=1){
    $dataInicial = date('Y-m-d');
    $dataFinal = $data;
    $date = (strtotime($dataFinal) - strtotime($dataInicial))/86400;
    if($entregue==0){
        if($tipo==1){
            if($date==0){return 'A entrega é hoje';}
            else if($date>0 && $date!=0){return 'Faltam '.$date.' dias';}
            else{return '<b style="color:red;">PENDENTE</b>';}
        }else{
            if($date==0){return 1;}
            else if($date>0 && $date!=0){return 2;}
            else{return 0;}
        }
    }else{
        return 'ENTREGUE';
    }
}

function cor($data,$entregue){
$num = entregue($data,0,0);
    if($entregue==1){
        echo'green lighten-3';
    }else{
        if($num==1){
            echo 'blue lighten-3';
        }else if($num==0){echo 'red lighten-3';}
    }
}

function entregues(){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT COUNT(entregue) AS soma FROM trabalho WHERE entregue = 1");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
        $entregues = $linha['soma'];
    }
    $consulta = $pdo->query("SELECT COUNT(entregue) AS soma FROM trabalho WHERE entregue = 0");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
        $pendentes = $linha['soma'];
    }

    echo '<b style="color:#66bb6a ;">'.$entregues.'</b> | <b style="color:#ef5350 ;">'.$pendentes.'</b>';
}

?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title   >
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/estilo.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        function excluirRegistro(url) {
            if (confirm("Confirmar Exclusão?"))
                location.href = url; 
        }
    </script>
</head>
<body class="grey lighten-3">
<nav>
    <div class="nav-wrapper indigo grey darken-4">
        <a href="index.php" class="brand-logo center">Index</a>
        <ul class="left hide-on-med-and-down">
        <li><a href="cad.php">Novo</a></li>
        </ul>
        <ul class="right hide-on-med-and-down" style="margin-right:10px;">
        <li><?php entregues(); ?></li>
        </ul>
    </div>
</nav>

<div class="container">

    <form method="post">
    <div class="row">
        <div class=" col s11">
            <input type="text" name="consulta" id="consulta" value="<?php echo $consulta;?>">
        </div>
        <div class=" col s1">
           <button class="btn-flat" type="submit" style="margin:12px 0px 0px -15px;"><i class=" min material-icons">search</i></button>
        </div>
    </div>
    </form>
    <br>
    <?php 
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM trabalho WHERE nome LIKE '$consulta%'");
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <div class="col s12 m7">
    <div class="card horizontal">
        <div class="card-stacked">
            <div class="card-content <?php cor($linha['entrega'],$linha['entregue'])?>">
                <div class="row">
                    <div class="col s11">
                        <b class="header" style="font-size:25px;"><?php echo $linha['nome'] ?>, <?php echo date_format(date_create($linha['entrega']),"d/m/Y")?></b>
                    </div>
                    <div class="col s1">
                        <a href="show.php?id=<?php echo $linha['cod']?>" class="btn-floating btn-min brand-logo center black"><i class=" min material-icons">expand_more</i></a>
                    </div>
                    <div class="col s12">
                        <b><?php echo $linha['materia']?> - <?php echo entregue ($linha['entrega'],$linha['entregue']);?></b>
                    </div>
                    <div class="col s12">
                        <pre><?php echo $linha['descricao'] ?></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }?> 

</div>
</body>
</html>
