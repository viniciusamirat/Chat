<?php
require_once '../conversa/functions.php';
autenticar();
config();

$resu = procurar_contato($_SESSION['usuario']);

foreach ($resu as $row){
    $nome = $row['nome'];
    $email = $row['email'];
    $senha = $row['senha'];
    $foto = $row['foto'];
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../cadastro/js.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Cadastrar</title>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-info navbar-dark">
        <img onclick="history.go(-1);" src="../icon/seta.png" alt="Seta" style="width: 40px; height: 40px;">
        <span style="color: white;"><strong>Editar perfil</strong></span>
    </nav>
    <br>
    

    <div class="container" style="text-align: center;">
    
        <?php if (isset($_SESSION['erro'])) : ?>
            
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?php echo $_SESSION['erro']; ?></strong>
                <?php unset($_SESSION['erro']); ?>
            </div>
        <?php endif; ?>

        <h2><strong>Editar perfil</strong></h2>
        <form action="update.php" method="POST">
            <div style="text-align: left;">
                <label for="nome" style="margin-top:5px; margin-bottom: 0px;"><strong>Nome:</strong></label>
                <input class="input input-group" type="text" name="nome" id="nome" value="<?php echo $nome; ?>" required>
                <label for="email" style="margin-top:15px; margin-bottom: 0px;"><strong>Email:</strong></label>
                <input class="input input-group" type="text" name="email" id="email" value="<?php echo $email; ?>" required>
                <label for="senha" style="margin-top:15px; margin-bottom: 0px;"><strong>Senha:</strong></label>
                <input class="input input-group" type="password" name="senha" id="senha" value="<?php echo $senha; ?>" required>
            </div>
            
            <div style="text-align: right; margin-top:5px;">
                <input type="checkbox" name="olho" id="olho">
                <label for="olho">Mostrar senha</label>
            </div>
            <br>

            <input type="hidden" name="foto" id="foto" value="<?php echo $foto; ?>">

            <h3><strong>Escolha seu avatar</strong></h3>

            <div class="row">
                <div class="col" onclick="image('1.png')"><img src="../cadastro/avatar/1.png" alt="Avatar" id="1.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
                <div class="col" onclick="image('2.png')"><img src="../cadastro/avatar/2.png" alt="Avatar" id="2.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
                <div class="col" onclick="image('3.png')"><img src="../cadastro/avatar/3.png" alt="Avatar" id="3.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
                <div class="col" onclick="image('4.png')"><img src="../cadastro/avatar/4.png" alt="Avatar" id="4.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
                <div class="col" onclick="image('5.png')"><img src="../cadastro/avatar/5.png" alt="Avatar" id="5.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
                <div class="col" onclick="image('6.png')"><img src="../cadastro/avatar/6.png" alt="Avatar" id="6.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
            </div>
            <div class="row">
                <div class="col" onclick="image('7.png')"><img src="../cadastro/avatar/7.png" alt="Avatar" id="7.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
                <div class="col" onclick="image('8.png')"><img src="../cadastro/avatar/8.png" alt="Avatar" id="8.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
                <div class="col" onclick="image('9.png')"><img src="../cadastro/avatar/9.png" alt="Avatar" id="9.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
                <div class="col" onclick="image('10.png')"><img src="../cadastro/avatar/10.png" alt="Avatar" id="10.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
                <div class="col" onclick="image('11.png')"><img src="../cadastro/avatar/11.png" alt="Avatar" id="11.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
                <div class="col" onclick="image('12.png')"><img src="../cadastro/avatar/12.png" alt="Avatar" id="12.png" style="width: 100px; height: 100px; border-radius: 100%;"></div>
            </div>
            <br>
            <input class="btn btn-success" type="submit" value="Confirmar mudanças">
        </form>
        <br>
        <br>
    </div>

    <script>
        let fotoo = window.document.getElementById("foto");
        image(fotoo.value);

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