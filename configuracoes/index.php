<?php
require_once('../conversa/functions.php');
autenticar();
config();

$resu = procurar_dados($_SESSION['usuario']);
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
    <title>Configurações</title>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-info navbar-dark" style="position: fixed; width: 100%;">
        <img src="../icon/seta.png" alt="Seta" onclick="history.go(-1);" style="width: 40px; height: 40px;">
        <span style="color: white;"><strong>Configurações</strong></span>
    </nav>
    <br>
    <br>
    <br>

    <?php if (isset($_SESSION['erro'])) : ?>
            
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?php echo $_SESSION['erro']; ?></strong>
                <?php unset($_SESSION['erro']); ?>
            </div>
        <?php endif; ?>

    <div class="container">
        <ul class="list-group list-group-flush">
            <a data-toggle="modal" data-target="#dados" class="list-group-item list-group-item-action">Meus dados</a href="#">
            <a data-toggle="modal" data-target="#apagar" class="list-group-item list-group-item-action">Apagar conta</a>
        </ul>
    </div>

    <div class="container">
        <!-- The Modal -->
        <div class="modal" id="dados">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Meus dados</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <p><strong>foto:</strong> <?php echo $resu[0]; ?></p>
                        <p><strong>Nome:</strong> <?php echo $resu[1]; ?></p>
                        <p><strong>Email:</strong> <?php echo $resu[2]; ?></p>
                        <p><strong>Data do cadastro:</strong> <?php echo data($resu[3]); ?></p>
                        <p><strong>Hora do cadastro:</strong> <?php echo $resu[4]; ?></p>
                        <p><strong>Mensagens enviadas:</strong> <?php echo $resu[5]; ?></p>
                        <p><strong>Mensagens recebidas:</strong> <?php echo $resu[6]; ?></p>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <div style="margin-right: auto;">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- The Modal -->
        <div class="modal" id="apagar">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Deseja realmente excluir sua conta?</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        Seus dados de perfil e todas as suas conversas serão apagadas.
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <div style="margin-right: auto;">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                        
                        <button type="button" class="btn btn-warning" onclick="window.location.href='excluir.php?id=<?php echo $_SESSION['usuario']; ?>'">Apagar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>