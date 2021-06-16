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
      
      //$today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
  
      $mensagem = $_POST['msg'];
      $de = $_SESSION['usuario'];
      $para = $_POST['para'];
      
      save('conversas', $de, $para, $mensagem);
      header('location: index.php');
    }
}

function reload($contato){
    return atualizar($contato);
}

function procurar_contatos(){
    return find_contact();
}

function login(){
    if (!empty($_POST['email']) and !empty($_POST['senha'])) {

        $usu = $_POST['email'];
        $senha = $_POST['senha'];
        
        $resu = find_usu('usuarios', $usu, $senha);

        if ($resu == false){
            header('location: index.php');
        } else {
            
            foreach ($resu as $row){
                $_SESSION['usuario'] = $row['id'];
            }
            header('location: ../chat/contatos/index.php');
        }

    }
}







?>