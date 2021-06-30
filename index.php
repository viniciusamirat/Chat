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
        <div class="dropdown">
            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="sobre/">Sobre</a>
            </div>
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

        <?php if (isset($_SESSION['autenticar'])) : ?>
            
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?php echo $_SESSION['autenticar']; ?></strong>
                <?php unset($_SESSION['autenticar']); ?>
            </div>
        <?php endif; ?>

        <h2><strong>Login</strong></h2>
        <form action="login.php" method="POST">
            <div style="text-align: left;">
                <label for="email" style="margin-top:5px; margin-bottom: 0px;"><strong>Email:</strong></label>
                <input class="input input-group" type="text" name="email" id="email" required>
                <label for="senha" style="margin-top:15px; margin-bottom: 0px;"><strong>Senha:</strong></label>
                <input class="input input-group" type="password" id="senha" name="senha" required>
            </div>
            <div style="text-align: right; margin-top:5px;">
                <input type="checkbox" name="olho" id="olho">
                <label for="olho">Mostrar senha</label>
            </div><br>
            <button class="btn btn-info" type="button" onclick="window.location.href='cadastro/'">Cadastrar</button>
            <input class="btn btn-success" type="submit" value="Entrar">
        </form>
    </div>

    <script>
        //Código que faz a senha ficar visível
        let senha = $('#senha');
        let olho= $("#olho");

        olho.click(function() {
            if(olho[0].checked){
                senha.attr("type", "text");
            } else {
                senha.attr("type", "password");
            }
            
        });
    </script>
</body>
</html>