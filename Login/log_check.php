<?php
session_start();

$host= "localhost";

$user= "root";

$pass= "";

$db= "enfsanar";

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
        
        $sql= "select * from login where usuario = '".$usuario."' AND contra = '".$contra."' ";
        
        $result = mysqli_query($connect, $sql);
        
        $row = mysqli_fetch_array($result);
        
        //Pagina Recepcionista
        if($row["rol"] == "recepcionista") 
        {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = "recepcionista";
            
            header("location:home_recep.php");
            exit;
        }
        
        //Pagina Auxiliar
        if($row["rol"] == "enfermera") 
        {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = "enfermera";
            
            header("location:home_enf.php");
            exit;
        }
        
        else 
        {
            $_SESSION['loginMessage'] = "Usuario / Clave Incorrectas";
            header("location:login.php");
            exit;
        }
        
    }