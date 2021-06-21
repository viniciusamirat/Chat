<?php

session_start();

function config_login(){
    require_once 'config.php';
    require_once DB_API;
}

function config(){
    require_once '../config.php' ;
    require_once DB_API;
}


function add() {

    if (!empty($_POST['msg'])) {
      
      $mensagem = $_POST['msg'];
      $de = $_SESSION['usuario'];
      $para = $_SESSION['contato'];
      
      save('conversas', $de, $para, $mensagem);
    }
}

function reload($contato){
    return atualizar($contato);
}

function procurar_contatos(){
    return find_contacts();
}

function procurar_contato($contact){
    return find_contact($contact);
}

function name($nome){
    return nome($nome);
}

function autenticar(){
    if (!isset($_SESSION['usuario'])){
        $_SESSION['erro'] = "Nenhum usuário logado.";
        header('location: ../inc/exit.php');
    } else {
        echo "hii";
    }
}

?>