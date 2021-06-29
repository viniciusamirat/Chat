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

function reload($contato){
    return atualizar($contato);
}

function procurar_contatos(){
    if (!find_contacts()){
        $_SESSION['erro'] = "Você ainda não tem nenhum contato.";
    }
    return find_contacts();
}

function procurar_contato($contact){
    return find_contact($contact);
}

function name($nome){
    return nome($nome);
}

function avatar($contato){
    return foto($contato);
}

function autenticar(){
    if (!isset($_SESSION['usuario'])){
        $_SESSION['autenticar'] = "Nenhum usuário logado.";
        header('location: ../inc/exit.php');
    }
}

function isContato($usuario, $contato){
    return isContact($usuario, $contato);
}

function addContato($usuario, $contato){
    addContact($usuario, $contato);
}

function tiraContato($usuario, $contato){
    removeContact($usuario, $contato);
}

function procurar_dados($usu){
    return find_data($usu);
}

function data($data){
    return date('d/m/Y', strtotime($data));
}

function excluir_usu($usu) {
    $resu = remove_usu($usu);

    if ($resu){
        $_SESSION['mensagem'] = "Conta excluida com sucesso!<br>Obrigado testar este projeto!";
        return true;
    } else {
        $_SESSION['erro'] = "Erro ao excluir sua conta!";
        return false;
    }
}
?>