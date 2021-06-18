<?php
require_once '../conversa/functions.php';
config();

cadastrar();
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="css/form.css">-->
    <script src="js.js"></script>
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
            </ul>
        </div>  
    </nav>

    <div class="container" style="text-align: center;">
        <h2><strong>Cadastrar novo usuário</strong></h2>
        <form action="index.php" method="POST">
            <input class="input input-group" type="text" name="nome" placeholder="Nome" required><br>
            <input class="input input-group" type="text" name="email" placeholder="Email" required><br>
            <input class="input input-group" type="password" name="senha" placeholder="Senha" required><br>
            <input type="hidden" name="foto" id="foto" value="">
            <!--<div name="foto" id="foto"></div>-->

            <h3><strong>Escolha seu avatar</strong></h3>

            <div class="row">
                <div class="col" onclick="image('1.png')"><img src="avatar/1.png" alt="Avatar" id="1.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
                <div class="col" onclick="image('2.png')"><img src="avatar/2.png" alt="Avatar" id="2.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
                <div class="col" onclick="image('3.png')"><img src="avatar/3.png" alt="Avatar" id="3.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
                <div class="col" onclick="image('4.png')"><img src="avatar/4.png" alt="Avatar" id="4.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
                <div class="col" onclick="image('5.png')"><img src="avatar/5.png" alt="Avatar" id="5.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
                <div class="col" onclick="image('6.png')"><img src="avatar/6.png" alt="Avatar" id="6.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
            </div>
            <div class="row">
                <div class="col" onclick="image('7.png')"><img src="avatar/7.png" alt="Avatar" id="7.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
                <div class="col" onclick="image('8.png')"><img src="avatar/8.png" alt="Avatar" id="8.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
                <div class="col" onclick="image('9.png')"><img src="avatar/9.png" alt="Avatar" id="9.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
                <div class="col" onclick="image('10.png')"><img src="avatar/10.png" alt="Avatar" id="10.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
                <div class="col" onclick="image('11.png')"><img src="avatar/11.png" alt="Avatar" id="11.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
                <div class="col" onclick="image('12.png')"><img src="avatar/12.png" alt="Avatar" id="12.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
            </div>
            <br>
            <input class="btn btn-success" type="submit" value="Cadastrar">
        </form>
        <br>
    </div>
</body>
</html>