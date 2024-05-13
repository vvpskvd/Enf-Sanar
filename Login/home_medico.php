<?php

session_start();
if (!isset($_SESSION["usuario"])) {
    
    header("location:login.php");
    exit;
    
} elseif($_SESSION["rol"] == "auxiliar" && $_SESSION["rol"] == "recepcionista") {
    
    header("location:login.php");
    exit;
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Medico</title>
</head>
<body>
    <h1>Pagina de Medico</h1>
    
    <a href="logout.php">Salir</a>
</body>
</html>