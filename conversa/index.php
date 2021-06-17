<?php 
require_once('functions.php');
config();
if (!empty($_GET['id'])) {

    $_SESSION['contato'] = $_GET['id'];
    
    
}

add();
$mensagens = reload($_SESSION['contato']);
//echo "bem vindo ". $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Chat</title>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-info navbar-dark" style="position: fixed; width: 100%;">
        <a href="../contatos/">
            <img src="../icon/seta.png" alt="Seta" style="width: 40px; height: 40px;">
            <img src="../cadastro/avatar/1.png" alt="Avatar" style="width: 50px; height: 50px; border-radius: 100%;">
        </a>

        <a href="../perfil/index.php?id=<?php echo $_SESSION['contato']; ?>">
            <span style="color: white;"><strong><?php echo name($_SESSION['contato']); ?></strong></span>
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../perfil/index.php?id=<?php echo $_SESSION['contato']; ?>">Ver perfil</a>
                </li>
            </ul>
        </div>  
    </nav>
    <br>
    <br>
    <br>
    
    <?php if ($mensagens) : ?>
        <?php foreach ($mensagens as $row) : ?>

            <div class="container <?php if ($row['de'] != $_SESSION['usuario']){ echo 'darker';} ?>">
                <p <?php if ($row['de'] == $_SESSION['usuario']){ echo 'class="text-right"';} ?>><strong><?php if ($row['de'] == $_SESSION['usuario']){ echo name($_SESSION['usuario']); } else { echo name($_SESSION['contato']);} ?></strong></p>
                <p <?php if ($row['de'] == $_SESSION['usuario']){ echo 'class="text-right"';} ?>><?php echo $row['mensagem']; ?></p>
                <span class="time<?php if ($row['de'] != $_SESSION['usuario']){ echo '-left';} else { echo '-right';} ?>"><?php echo $row['hora']; ?></span>
            </div>

        <?php endforeach; ?>
    <?php endif; ?>

    <br>
    <br>
    <br>

    <footer class="footer">
            <form action="index.php" method="POST">
                <!--<div class="row">
                    <div class="col-8">
                        <input class="input input-group" type="text" name="msg">
                    </div>
                    <div class="col-4">
                        <input class="btn btn-primary" type="submit" value="Enviar">
                    </div>-->
                    
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="msg" placeholder="Escreva aqui">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Enviar</button>
                    </div>
                </div>
                
            </form>
    </footer>
</body>
</html>