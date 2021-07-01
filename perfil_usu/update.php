<?php
require_once '../conversa/functions.php';
config();

$resu1 = procurar_contato($_SESSION['usuario']);

//Pega o email cadastrado no banco para caso ele não altere o mesmo
foreach ($resu1 as $row){
    $email_db = $row['email'];
}


//Verifica se todos os campos estão preenchidos
if (!empty($_POST['nome']) and !empty($_POST['email']) and !empty($_POST['senha'])  and !empty($_POST['foto'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $foto = $_POST['foto'];

    //Verifica se o novo email inserido já existe
    if ($email != $email_db){
        if (email_existe($email)){
            $_SESSION['erro'] = "Esse email já existe.";
            header('location: editar.php');
        } else {
            $resu = update_usu('usuarios', $foto, $nome, $email, $senha);

    
            if ($resu == false){
                $_SESSION['erro'] = "Erro ao cadastrar.";
                header('location: editar.php');
            } else {
                $_SESSION['mensagem'] = "Perfil editado com sucesso!";
                header('location: index.php');
            }
        }
        
    } else {
        $resu = update_usu('usuarios', $foto, $nome, $email, $senha);

    
        if ($resu == false){
            $_SESSION['erro'] = "Erro ao cadastrar.";
            header('location: editar.php');
        } else {
            $_SESSION['mensagem'] = "Perfil editado com sucesso!";
            header('location: index.php');
        }
    }
    
    

//Verifica se o usuário escolheu um avatar
} else if (!empty($_POST['nome']) and !empty($_POST['email']) and !empty($_POST['senha'])){
    $_SESSION['erro'] = "Escolha um avatar.";
    header('location: editar.php');
} else {
    $_SESSION['erro'] = "Preencha todos os campos e escolha um avatar.";
    header('location: editar.php');
}


?>