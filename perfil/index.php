<?php
require_once('../conversa/functions.php');
autenticar();
config();
if (!empty($_GET['id'])) {
    $_SESSION['contato'] = $_GET['id'];
}

$resu = procurar_contato($_SESSION['contato']);

foreach ($resu as $row){
    $nome = $row['nome'];
    $email = $row['email'];
    $foto = $row['foto'];
}

$resu2 = isContato($_SESSION['usuario'], $_SESSION['contato']);


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Perfil</title>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-info navbar-dark" style="position: fixed; width: 100%;">
        <img onclick="history.go(-1);" src="../icon/seta.png" alt="Seta" style="width: 40px; height: 40px;">
        <span style="color: white;"><strong><?php echo $nome ?></strong></span>
    </nav>
    <br>
    <br>
    <br>

    <div class="container">
        <img src="../cadastro/avatar/<?php echo $foto; ?>" class="card-img-top">
    </div>
    <br>

    <form action="add.php" method="post" id="form">
        <input type="hidden" name="contato" id="contato" value="">
        <?php if ($resu2) : ?>

            <div class="container" style="text-align: center;">
                <button class="btn btn-success btn-sm" onclick="remove()">Adicionado &check;</button>
            </div>

        <?php else : ?>

            <div class="container" style="text-align: center;">
                <button class="btn btn-primary btn-sm" onclick="add()">Adicionar</button>
            </div>

        <?php endif; ?>
    </form>
    <br>
    <div class="container" style="text-align: center; font-weight: bold;">
        <p><?php echo $nome; ?></p>
        <p><?php echo $email; ?></p>

    </div>
    
    <script>
        let campo = window.document.getElementById("contato");

        function remove(){
            campo.value = "nao";
            document.getElementById("form").submit();
        }

        function add(){
            campo.value = "sim";
            document.getElementById("form").submit();
        }
    </script>
</body>
</html>