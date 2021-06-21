<?php

unset($_SESSION['usuario']);
unset($_SESSION['contato']);
unset($_SESSION['erro']);
unset($_SESSION['mensagem']);

header('location: ../index.php');



?>