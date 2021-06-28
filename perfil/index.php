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
        <!--<a href="../conversa/index.php?id=<?php //echo $_SESSION['contato']; ?>#fim">-->
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
    <div class="container" style="text-align: center; font-weight: bold;">
        <p><?php echo $nome; ?></p>
        <p><?php echo $email; ?></p>

    </div>
    
</body>
</html>