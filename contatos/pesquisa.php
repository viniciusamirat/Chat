<?php
require_once '../conversa/functions.php';
config();

if (!empty($_POST['usuario'])) {
  
  $usuario = $_POST['usuario'];
  
    if (!procurar($usuario)){
        $_SESSION['erro'] = "Nenhum usuário encontrado :(";
    } else {
        $_SESSION['resultado'] = procurar($usuario);
    }

    header("location: addContato.php");
}
?>