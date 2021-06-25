<?php 


require_once('functions.php');
autenticar();
config();
if (!empty($_GET['id'])) {

    $_SESSION['contato'] = $_GET['id'];
    
    
}

add();
$mensagens = reload($_SESSION['contato']);

$resu = procurar_contato($_SESSION['contato']);

foreach ($resu as $row){
    $nome = $row['nome'];
    $foto = $row['foto'];
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<meta http-equiv="refresh" content="5">-->
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Chat</title>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-info navbar-dark" style="position: fixed; width: 100%;">
        <a style="text-decoration: none;" href="../contatos/">
            <img src="../icon/seta.png" alt="Seta" style="width: 40px; height: 40px;">
            <img src="../cadastro/avatar/<?php echo $foto; ?>" alt="Avatar" style="width: 50px; height: 50px; border-radius: 100%;">
        </a>

        <a style="text-decoration: none;" href="../perfil/index.php?id=<?php echo $_SESSION['contato']; ?>">
            <span style="color: white;"><strong><?php echo $nome; ?></strong></span>
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
                <p <?php if ($row['de'] == $_SESSION['usuario']){ echo 'class="text-right"';} ?>><strong><?php if ($row['de'] == $_SESSION['usuario']){ echo name($_SESSION['usuario']); } else { echo $nome;} ?></strong></p>
                <p <?php if ($row['de'] == $_SESSION['usuario']){ echo 'class="text-right"';} ?>><?php echo $row['mensagem']; ?></p>
                <span class="time<?php if ($row['de'] != $_SESSION['usuario']){ echo '-left';} else { echo '-right';} ?>"><?php echo $row['hora']; ?></span>
            </div>

        <?php endforeach; ?>
    <?php endif; ?>

    <br>
    <br>
    <br>
    <br>

    <footer class="footer" style="margin-bottom: 30px;">
            <form action="index.php?id=<?php echo $_SESSION['contato']; ?>#fim" method="POST">
                </div>
                <div class="input-group mb-3">
                    <!--<input type="text" class="form-control" name="msg" placeholder="Escreva aqui">-->
                    <input type="text" class="form-control" oninput="botao(this)" name="msg" placeholder="Escreva aqui">
                    <div class="input-group-append">
                        <button class="btn" id="btn" type="submit">Atualizar</button>
                        <!--<button class="btn btn-success" type="submit">Enviar</button>-->
                    </div>
                </div>
            </form>
    </footer>
    <a name="fim"></a>
    <script>
        //var heightPage = document.body.scrollHeight;
        //window.scrollTo(0 , heightPage);
        
        let btn = window.document.getElementById('btn');
        btn.style.background = "blue";
        btn.style.color = "white";
        function botao(i){
   
            var v = i.value;

            if (v.length >= 1){
                btn.innerHTML = "Enviar";
                btn.style.background = "green";
            } else {
                btn.innerHTML = "Atualizar";
                btn.style.background = "blue";
            }


        }
    </script>
</body>
</html>