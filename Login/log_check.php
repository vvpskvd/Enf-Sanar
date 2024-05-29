<?php
session_start();

$host= "localhost";
$user= "root";
$pass= "";
$db= "enfsanar";

$connect= mysqli_connect($host, $user, $pass, $db);

// Revisar si hay conexión a la BD.
if ($connect == false) {
    die(mysqli_connect_error());
}

//Main.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = mysqli_real_escape_string($connect, $_POST["usuario"]);
    $contra = mysqli_real_escape_string($connect, $_POST["contra"]);
    
    //Busqueda de usuario, rol y contraseña.
    $sql = "SELECT * FROM login WHERE usuario = '$usuario' AND contra = '$contra'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);
    
    if ($row) {
        // Página Recepcionista.
        if ($row["rol"] == "recepcionista") {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = "recepcionista";
            
            header("Location: ../Recepcionista/index.php");
            exit;
        }
        // Página Enfermera.
        elseif ($row["rol"] == "enfermera") {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = "enfermera";
            
            header("Location: ../Enfermera/index.php");
            exit;
        }
    } else {
        //Error contraseña / usuario incorrectos.
        $_SESSION['loginMessage'] = "Usuario / Clave Incorrectas";
        header("Location: login.php");
        exit;
    }
}
?>
