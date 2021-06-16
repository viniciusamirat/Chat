<?php
require_once 'config.php';
require_once 'inc/database.php';
login();

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <title>Login</title>
</head>
<body>
    <div class="login">
        <div class="container">
            <form action="index.php" method="POST">
                <div class="row">
                    <h2 style="text-align:center">Login na rede social do amirat</h2>
                    <div class="col" style="text-align: center;">
                        <input type="text" class="texto" name="email" placeholder="Email" required>
                        <input type="password" class="texto" name="senha" placeholder="Senha" required>
                        <input type="submit"  class="texto" value="Login">
                    </div>
                </div>
            </form>
        </div>

        <div class="bottom-container">
            <div class="row">
                <div class="col">
                    <a href="#" style="color:white" class="btn">Se cadastrar</a>
                </div>
                <div class="col">
                    <a href="#" style="color:white" class="btn">Esqueceu a senha?</a>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>