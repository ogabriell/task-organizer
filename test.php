<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<br>
<a href="index.php"><button>Listar</button></a>
<a href="cad.php"><button>Novo</button></a>
<br><br>
<form action="" method="post">
    <input required=true  autocomplete="off"   placeholder="Entrega" type="date" name="entrega" id="entrega" value="<?php //if ($acao == "editar") echo $dados['entrega']; ?>"><br>
    <br><button type="submit">Salvar</button>
</form>
<?php

?>
</body>
</html>