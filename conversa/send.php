<?php
require_once '../conversa/functions.php';
config();

if (!empty($_POST['msg'])) {
    
    $mensagem = $_POST['msg'];
    $de = $_SESSION['usuario'];
    $para = $_SESSION['contato'];
    
    save('conversas', $de, $para, $mensagem);

    header("location: index.php?id=".$_SESSION['contato']."#fim");
} else {
    header("location: index.php?id=".$_SESSION['contato']."#fim");
}




?>