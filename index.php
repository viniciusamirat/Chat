<?php
require_once 'conversa/functions.php';
config_login();

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
    <title>Login</title>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-info navbar-dark">
    <a class="navbar-brand" href="#"><strong>Chat</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Sobre</a>
                </li>
            </ul>
        </div>  
    </nav>
    <br>

    <div class="container" style="text-align: center;">

        <?php if (isset($_SESSION['mensagem'])) : ?>
            
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?php echo $_SESSION['mensagem']; ?></strong>
                <?php unset($_SESSION['mensagem']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['erro'])) : ?>
            
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?php echo $_SESSION['erro']; ?></strong>
                <?php unset($_SESSION['erro']); ?>
            </div>
        <?php endif; ?>

        <h2><strong>Login</strong></h2>
        <form action="login.php" method="POST">
            <input class="input input-group" type="text" name="email" placeholder="Email" required><br>
            <input class="input input-group" type="password" name="senha" placeholder="Senha" required><br>
            <input class="btn btn-success" type="submit" value="Entrar">
            <button class="btn btn-info" type="button" onclick="window.location.href='cadastro/'">Cadastrar</button>
        </form>
    </div>
</body>
</html>