<?php
require_once('../conversa/functions.php');
autenticar();
config();

if (!empty($_GET['id'] and $_GET['id'] == $_SESSION['usuario'])){
    $resu = excluir_usu($_SESSION['usuario']);

    if ($resu){
        header('location: ../index.php');
    } else {
        echo "<script>history.go(-1)</script>;";
    }
} else {
    echo "<script>history.go(-1)</script>;";
}




?>