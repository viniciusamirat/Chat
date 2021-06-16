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
    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d');
    $hora = date('H:i');
    
    $database = open_database();

    try {
        $sql = $database->prepare("INSERT INTO $table (de, para, mensagem, data_msg, hora) VALUES (:de, :para, :mensagem, :data_msg, :hora)");
        $sql->execute(array(
            ':de'=>$de,
            ':para'=>$para,
            ':mensagem'=>$mensagem,
            ':data_msg'=>$data,
            ':hora'=>$hora
        ));


    } catch (PSOException $e){
        echo "Error: " . $e->getMessage();
    }

    close_database($database);
}

function atualizar($contato){
    $database = open_database();

    try {
        $search = $database->prepare("SELECT * FROM conversas WHERE de = ".$_SESSION['usuario']." AND para = $contato OR para = ".$_SESSION['usuario']." AND de = $contato ORDER BY id");
        $search->execute();

        if ($search->rowCount() <= 0){
            return false;
        } else {
            return $search->fetchAll();
        }
    } catch (PDOException $e){
        return false;
    }

    close_database($database);
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

function find_contact(){
    $database = open_database();
    
    try{
        $sql = $database->prepare("SELECT id, nome FROM usuarios WHERE NOT id = ".$_SESSION['usuario'].";");
        $sql->execute();

        if ($sql->rowCount() < 1){
            return false;
        } else {
            return $sql->fetchAll();
        }
        
    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }

    close_database($database);
}

function nome($nome){
    $database = open_database();
    
    try{
        $sql = $database->prepare("SELECT nome FROM usuarios WHERE id = $nome");
        $sql->execute();

        if ($sql->rowCount() < 1){
            return false;
        } else {
            foreach ($sql->fetchAll() as $row){
                $nome_res = $row['nome'];
            }
            return $nome_res;
        }
        
    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }

    close_database($database);
}
?>