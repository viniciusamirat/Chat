<?php
require_once('../conversa/functions.php');
autenticar();
config();
$resu = procurar_contatos();
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
    <title>Contatos</title>

    <style>
        .novo{
            margin-left: auto;
            margin-right: 45px;
            width: 5%;
        }

        footer{
            position: fixed;
            bottom:50px;
            width: 100%;

        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-info navbar-dark">
        <a class="navbar-brand" href="#"><strong>Contatos</strong></a>
        <div class="dropdown">
            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="../perfil_usu/">Meu perfil</a>
                <a class="dropdown-item" href="#">Configurações</a>
                <a class="dropdown-item" href="../sobre/">Sobre</a>
            </div>
        </div>
    </nav>


    <div class="container mt-3">
        <?php if ($resu) : ?>
            <ul class="list-group">
                <?php foreach ($resu as $row) : ?>
                    <a style="text-decoration: none;" href="../conversa/index.php?id=<?php echo $row['contato']; ?>#fim">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <img src="../cadastro/avatar/<?php echo avatar($row['contato']); ?>" alt="Avatar" style="width: 40px; height: 40px; border-radius: 100%;">
                            <section style="margin-left: 15px; margin-right: auto;"><?php echo name($row['contato']); ?></section>
                            <!--<span class="badge badge-primary badge-pill">12</span>-->
                        </li>
                    </a>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?php echo $_SESSION['erro']; ?></strong>
                <?php unset($_SESSION['erro']); ?>
            </div>
        <?php endif; ?>
    </div>

    <footer>
        <div class="novo">
            <button type="button" class="btn btn-success btn-lg" onclick="window.location.href='addContato.php'" style="font-size: 30px; padding-top: 0px; padding-bottom: 0px; padding-left: 10px; padding-right: 10px;">+</button>
        </div>
        
    </footer>
</body>
</html>