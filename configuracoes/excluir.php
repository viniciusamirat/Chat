<?php
require_once('../conversa/functions.php');
autenticar();
config();

//Verifica se o id passado pelo GET é o mesmo id do usuário para efetuar a exclusão de conta
if (!empty($_GET['id'] and $_GET['id'] == $_SESSION['usuario'])){
    $resu = excluir_usu($_SESSION['usuario']);

    if ($resu){
        header('location: ../inc/exit.php');
    } else {
        echo "<script>history.go(-1)</script>;";
    }
} else {
    echo "<script>history.go(-1)</script>;";
}




?>