<?php
require_once '../conversa/functions.php';
config();

//Adiciona ou remove um contato
if ($_POST['contato'] == "sim") {
  
    addContato($_SESSION['usuario'], $_SESSION['contato']);



    echo" <script>history.go(-1);</script>";
} else {
  
    tiraContato($_SESSION['usuario'], $_SESSION['contato']);



    echo" <script>history.go(-1);</script>";
}
?>