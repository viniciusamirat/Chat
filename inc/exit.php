<?php
session_start();

unset($_SESSION['usuario']);
unset($_SESSION['contato']);

header('location: ../index.php');



?>