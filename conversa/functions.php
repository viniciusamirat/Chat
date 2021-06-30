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

//Atualiza o chat
function reload($contato){
    return atualizar($contato);
}

//Procura todos os contatos do usuário
function procurar_contatos(){
    if (!find_contacts()){
        $_SESSION['erro'] = "Você ainda não tem nenhum contato.";
    }
    return find_contacts();
}

//Procura as informações do contato (foto, nome, etc...)
function procurar_contato($contact){
    return find_contact($contact);
}

//Retorna o nome do usuário ou contato
function name($nome){
    return nome($nome);
}

//Retorna a foto do usuário ou contato
function avatar($contato){
    return foto($contato);
}

//Verifica se existe um usuário logado
function autenticar(){
    if (!isset($_SESSION['usuario'])){
        $_SESSION['autenticar'] = "Nenhum usuário logado.";
        header('location: ../inc/exit.php');
    }
}

//Retorna se é um contato adicionado ou não
function isContato($usuario, $contato){
    return isContact($usuario, $contato);
}

//adiciona um contato
function addContato($usuario, $contato){
    addContact($usuario, $contato);
}

//Remove o contato
function tiraContato($usuario, $contato){
    removeContact($usuario, $contato);
}

//Retorna os dados do usuário para as configurações
function procurar_dados($usu){
    return find_data($usu);
}

//Formatação da data nas configurações
function data($data){
    return date('d/m/Y', strtotime($data));
}

//Exclusão de usuário
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