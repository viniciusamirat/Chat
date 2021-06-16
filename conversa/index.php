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
    <nav class="navbar navbar-expand-md bg-dark navbar-dark" style="position: fixed; width: 100%;">
        <img src="../image/avatar.jpg" alt="Avatar" style="width: 50px; height: 50px;">
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
    <br>
    <br>
    <br>
    
    <?php foreach ($mensagens as $row) : ?>

        <div class="container <?php if ($row['de'] != 1){ echo 'darker';} ?>">
            <p <?php if ($row['de'] == $_SESSION['usuario']){ echo 'class="text-right"';} ?>><strong><?php if ($row['de'] == $_SESSION['usuario']){ echo $_SESSION['usuario']; } else { echo $_SESSION['contato'];} ?></strong></p>
            <!--<img src="f_logo_RGB-Hex-Blue_512.png" alt="Avatar" <?php //if ($row['de'] == 1){ echo 'class="right"';} ?>>-->
            <p <?php if ($row['de'] == $_SESSION['usuario']){ echo 'class="text-right"';} ?>><?php echo $row['mensagem']; ?></p>
            <span class="time<?php if ($row['de'] != 1){ echo '-left';} else { echo '-right';} ?>">11:00</span>
        </div>

    <?php endforeach; ?>

    <br>
    <br>
    <br>

    <footer class="footer">
            <form action="index.php" method="POST">
                <div class="row">
                    <!--<input type="hidden" name="de" value="<?php //echo $_SESSION['usuario']; ?>">-->
                    <input type="hidden" name="para" value="<?php echo $_SESSION['contato']; ?>">
                    <div class="col-8">
                        <input class="input input-group" type="text" name="msg">
                    </div>
                    <div class="col-4">
                        <input class="btn btn-primary" type="submit" value="Send">
                    </div>
                    
                </div>
                
            </form>
    </footer>
</body>
</html>