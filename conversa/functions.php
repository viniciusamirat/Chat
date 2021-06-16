<?php
require_once '../config.php' ;
require_once DB_API ;

function add() {

    if (!empty($_POST['msg'])) {
      
      //$today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
  
      $mensagem = $_POST['msg'];
      $de = $_POST['de'];
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








?>