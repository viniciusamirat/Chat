<?php
require_once '../conversa/functions.php';
config();

//Verifica se todos os campos estão preenchidos
if (!empty($_POST['nome']) and !empty($_POST['email']) and !empty($_POST['senha'])  and !empty($_POST['foto'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $foto = $_POST['foto'];

    //Verifica se o email inserido já existe
    if (email_existe($email)){
        $_SESSION['erro'] = "Esse email já existe.";
        header('location: index.php');
    } else {
        $resu = cadastrar_usu('usuarios', $foto, $nome, $email, $senha);

    
        if ($resu == false){
            $_SESSION['erro'] = "Erro ao cadastrar.";
            header('location: index.php');
        } else {
            $_SESSION['mensagem'] = "Cadastrado com sucesso!";
            header('location: ../index.php');
        }
    }
    
    

//Verifica se o usuário escolheu um avatar
} else if (!empty($_POST['nome']) and !empty($_POST['email']) and !empty($_POST['senha'])){
    $_SESSION['erro'] = "Escolha um avatar.";
    header('location: index.php');
} else {
    $_SESSION['erro'] = "Preencha todos os campos e escolha um avatar.";
    header('location: index.php');
}
    

?>