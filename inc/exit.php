<?php
session_start();

//Encerra as sessões e direciona o usuário de volta para a tela de login
unset($_SESSION['usuario']);
unset($_SESSION['contato']);

header('location: ../index.php');

?>