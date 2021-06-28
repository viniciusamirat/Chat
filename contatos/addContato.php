<?php
require_once('../conversa/functions.php');
autenticar();
config();

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
    <title>Adicionar contato</title>
    <style>
        .sombra{
            border-radius: 10px; 
            box-shadow: 0px 0px 5px rgba(128, 128, 128, 0.336);
            width: 90%;
        }
        
        .espaco{
            padding: 5px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-info navbar-dark">
    <a style="text-decoration: none;" href="index.php">
        <img src="../icon/seta.png" alt="Seta" style="width: 40px; height: 40px;">
    </a>
    <a class="navbar-brand" href="#"><strong>Adicionar contato</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../perfil_usu/">Meu perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../inc/exit.php">Sair</a>
                </li>
            </ul>
        </div>  
    </nav>
    <br>

    <div class="container sombra">
        <div class="container espaco">
            <form action="pesquisa.php" method="post">
                <h3 style="text-align: center;">Pesquise com o email do usuário</h3>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="usuario" placeholder="Email">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">&#128269;</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>

    <div class="container mt-3">
        <?php if (isset($_SESSION['resultado'])) : ?>
            <?php $resu = $_SESSION['resultado']; ?>
            <?php unset($_SESSION['resultado']); ?>
            <ul class="list-group">
                <?php foreach ($resu as $row) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <img src="../cadastro/avatar/<?php echo $row['foto']; ?>" alt="Avatar" style="width: 40px; height: 40px; border-radius: 100%;">
                        <section style="margin-left: 15px; margin-right: auto;"><?php echo $row['nome']; ?></section>
                        <button class="btn btn-primary btn-sm" onclick="window.location.href='../perfil/index.php?id=<?php echo $row['id']; ?>'">Ver perfil</button>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php elseif (isset($_SESSION['erro'])) : ?>
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?php echo $_SESSION['erro']; ?></strong>
                <?php unset($_SESSION['erro']); ?>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>