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

//Salva a mensagem enviada no DB
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

//atualiza o chat
function atualizar($contato){
    $database = open_database();

    try {
        $search = $database->prepare("SELECT * FROM conversas WHERE de = :de1 AND para = :para1 OR para = :para2 AND de = :de2 ORDER BY id");
        $search->execute(array(
            ':de1'=>$_SESSION['usuario'],
            ':para1'=>$contato,
            ':para2'=>$_SESSION['usuario'],
            ':de2'=>$contato
        ));

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

//Procura o usuário para efetuar o login
function find_usu($table, $usuario, $password){
    $database = open_database();

    try {
        $search = $database->prepare("SELECT * FROM $table WHERE email = :email and senha = :senha");
        $search->execute(array(
            ':email'=>$usuario,
            ':senha'=>$password
        ));

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

//Procura todos os contatos do usuário
function find_contacts(){
    $database = open_database();
    
    try{
        $sql = $database->prepare("SELECT contato FROM contatos WHERE usuario = :id");
        $sql->execute(array(
            ':id'=>$_SESSION['usuario']
        ));

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

//Procura as informações do contato (foto, nome, etc...)
function find_contact($contact){
    $database = open_database();
    
    try{
        $sql = $database->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->execute(array(
            ':id'=>$contact
        ));

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

//Retorna o nome do usuário ou contato de acordo com seu id
function nome($nome){
    $database = open_database();
    
    try{
        $sql = $database->prepare("SELECT nome FROM usuarios WHERE id = :id");
        $sql->execute(array(
            ':id'=>$nome
        ));

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

//Retorna a foto do usuário ou contato de acordo com seu id
function foto($contato){
    $database = open_database();
    
    try{
        $sql = $database->prepare("SELECT foto FROM usuarios WHERE id = :id");
        $sql->execute(array(
            ':id'=>$contato
        ));

        if ($sql->rowCount() < 1){
            return false;
        } else {
            foreach ($sql->fetchAll() as $row){
                $foto = $row['foto'];
            }
            return $foto;
        }
        
    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }

    close_database($database);
}

//Cadastra os novos usuários
function cadastrar_usu($table, $foto, $nome, $email, $senha){
    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d');
    $hora = date('H:i');
    
    $database = open_database();

    try {
        $sql = $database->prepare("INSERT INTO $table (foto, nome, email, senha, data_cadastro, hora_cadastro) VALUES (:foto, :nome, :email, :senha, :data_cadastro, :hora_cadastro)");
        $sql->execute(array(
            ':foto'=>$foto,
            ':nome'=>$nome,
            ':email'=>$email,
            ':senha'=>$senha,
            ':data_cadastro'=>$data,
            ':hora_cadastro'=>$hora
        ));

        return true;

    } catch (PSOException $e){
        echo "Error: " . $e->getMessage();
    }

    close_database($database);
}

//Procura um contato Quando efetua a pesquisa no arquivo pesquisa.php
function procurar($usuario){
    $database = open_database();
    
    try{
        $sql = $database->prepare("SELECT * FROM usuarios WHERE email = :email and id != :id");
        $sql->execute(array(
            ':email'=>$usuario,
            ':id'=>$_SESSION['usuario']
        ));

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

//Pesquisa se é um contato adicionado ou não
function isContact($usuario, $contato){
    $database = open_database();
    
    try{
        $sql = $database->prepare("SELECT * FROM contatos WHERE usuario = :usu and contato = :cont");
        $sql->execute(array(
            ':usu'=>$usuario,
            ':cont'=>$contato
        ));

        if ($sql->rowCount() < 1){
            return false;
        } else {
            return true;
        }
        
    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }

    close_database($database);
}

//adiciona um contato
function addContact($usuario, $contato){
    $database = open_database();
    
    try{
        $sql = $database->prepare("INSERT INTO contatos (usuario, contato) VALUES (:usu, :cont)");
        $sql->execute(array(
            ':usu'=>$usuario,
            ':cont'=>$contato
        ));

        if ($sql->rowCount() < 1){
            echo "Erro ao adicionar contato";
        }
        
    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }

    close_database($database);
}

//Remove o contato
function removeContact($usuario, $contato){
    $database = open_database();
    
    try{
        $sql = $database->prepare("DELETE FROM contatos WHERE usuario = :usu and contato = :cont");
        $sql->execute(array(
            ':usu'=>$usuario,
            ':cont'=>$contato
        ));

        if ($sql->rowCount() < 1){
            echo "Erro ao remover contato";
        }
        
    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }

    close_database($database);
}

//Procura os dados do usuário para as configurações
function find_data($usu){
    $database = open_database();
    
    try{
        $usuario = $database->prepare("SELECT * FROM usuarios WHERE id = :id");
        $usuario->execute(array(
            ':id'=>$usu
        ));

        foreach ($usuario as $dados){
            $foto = $dados['foto'];
            $nome = $dados['nome'];
            $email = $dados['email'];
            $data = $dados['data_cadastro'];
            $hora = $dados['hora_cadastro'];
        }

        $msg1 = $database->prepare("SELECT * FROM conversas WHERE de = :de");
        $msg1->execute(array(
            ':de'=>$usu
        ));

        $enviadas = $msg1->rowCount();

        $msg2 = $database->prepare("SELECT * FROM conversas WHERE para = :para");
        $msg2->execute(array(
            ':para'=>$usu
        ));

        $recebidas = $msg2->rowCount();

        $infos = array($foto, $nome, $email, $data, $hora, $enviadas, $recebidas);

        return $infos;
        
    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }

    close_database($database);
}

//Apaga a conta do usuário
function remove_usu($usu){
    $database = open_database();
    
    try{
        $sql = $database->prepare("DELETE FROM contatos WHERE usuario = :usu or contato = :cont");
        $sql->execute(array(
            ':usu'=>$usu,
            ':cont'=>$usu
        ));

        $sql2 = $database->prepare("DELETE FROM conversas WHERE de = :usu or para = :usu2");
        $sql2->execute(array(
            ':usu'=>$usu,
            ':usu2'=>$usu
        ));

        $sql3 = $database->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql3->execute(array(
            ':id'=>$usu
        ));

        if ($sql3->rowCount() == 1){
            return true;
        } else {
            return false;
        }
        
    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }

    close_database($database);
}
?>