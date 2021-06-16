<?php
require_once('../conversa/functions.php');

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
</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="#">Contatos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sair</a>
                </li>
            </ul>
        </div>  
    </nav>


    <div class="container mt-3">
        <?php if ($resu) : ?>
            <ul class="list-group">
                <?php foreach ($resu as $row) : ?>
                    <a href="../conversa/index.php?id=<?php echo $row['id']; ?>">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?php echo $row['nome']; ?>
                            <span class="badge badge-primary badge-pill">12</span>
                        </li>
                    </a>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>Nenhum contato encontrado</p>
        <?php endif; ?>
    </div>
</body>
</html>