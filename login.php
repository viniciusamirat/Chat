<?php
require_once 'conversa/functions.php';
config_login();

if (!empty($_POST['email']) and !empty($_POST['senha'])) {

    $usu = $_POST['email'];
    $senha = $_POST['senha'];
    
    $resu = find_usu('usuarios', $usu, $senha);

    if ($resu == false){

        $_SESSION['erro'] = "Usuário não encontrado.";
        header('location: index.php');
    } else {
        
        foreach ($resu as $row){
            $_SESSION['usuario'] = $row['id'];
        }
        header('location: ../chat/contatos/index.php');
    }

} else {
    $_SESSION['erro'] = "Preencha todos os campos.";
    header('location: index.php');
}

?>