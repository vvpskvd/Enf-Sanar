<?php
session_start();

$host= "localhost";

$user= "root";

$pass= "";

$db= "log_enfsanar";

$connect= mysqli_connect($host, $user, $pass, $db);

//Revisar si hay conexion a la BD.
if($connect == false) 
    {
    die(mysqli_connect_error());
    }


    if($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $usuario = $_POST["usuario"];
        $contra = $_POST["contra"];
        
        $sql= "select * from usuarios_login where usuario = '".$usuario."' AND contra = '".$contra."' ";
        
        $result = mysqli_query($connect, $sql);
        
        $row = mysqli_fetch_array($result);
        
        //Pagina Recepcionista
        if($row["rol"] == "recepcionista") 
        {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = "recepcionista";
            
            header("location:home_recepcion.php");
            exit;
        }
        
        //Pagina Auxiliar
        if($row["rol"] == "auxiliar") 
        {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = "auxiliar";
            
            header("location:home_auxiliar.php");
            exit;
        }
        
        else 
        {
            $_SESSION['loginMessage'] = "Usuario / Clave Incorrectas";
            header("location:login.php");
            exit;
        }
        
    }