<?php

function open_database(){
    try{
        $conexao = new PDO ("mysql:host=".DB_HOST.";dbname=".DB_NAME.";",DB_USER,DB_PASSWORD);
        return $conexao;
    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
        return false;
    }
    
}

function close_database($conexao){
    try{
        unset($conexao);
    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

function save($table, $de, $para, $mensagem){
    $database = open_database();

    try {
        $sql = $database->prepare("INSERT INTO $table (de, para, mensagem) VALUES (:de, :para, :mensagem)");
        $sql->execute(array(
            ':de'=>$de,
            ':para'=>$para,
            ':mensagem'=>$mensagem
        ));


    } catch (PSOException $e){
        echo "Error: " . $e->getMessage();
    }

    close_database($database);
}

function atualizar(){
    $database = open_database();

    try {
        $search = $database->prepare("SELECT * FROM conversas");
        $search->execute();

        if ($search->rowCount() <= 0){
            return false;
        } else {
            return $search->fetchAll();
        }
    } catch (PDOException $e){
        return false;
    }
}

function login(){
    if (!empty($_POST['email']) and !empty($_POST['senha'])) {

        $usu = $_POST['email'];
        $senha = $_POST['senha'];
        
        $resu = find_usu('usuarios', $usu, $senha);

        if ($resu == false){
            header('location: index.php');
        } else {
            session_start();
            foreach ($resu as $row){
                $_SESSION['usuario'] = $row['id'];
            }
            header('location: ../chat/conversa/index.php');
        }

    }
}

function find_usu($table, $usuario, $password){
    $database = open_database();

    try {
        $search = $database->prepare("SELECT * FROM $table WHERE email = '$usuario' and senha = '$password'");
        $search->execute();

        if ($search->rowCount() <= 0){
            return false;
        } else if ($search->rowCount() == 1){
            return $search->fetchAll();
        }
    } catch (PDOException $e){
        return false;
    }

    close_database($database);
}


?>