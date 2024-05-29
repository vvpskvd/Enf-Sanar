<!DOCTYPE html>
<html lang="en">
<head>
    <!--CSS / Bootstrap y Logo Pestaña-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="icon" href="../img/LogoImageWeb.ico" type="image/x-icon">

</head>

<body>
    
    <center>
        
        <div class="formulario">
            
            <!--Logo y mensaje de usuario / contraseña incorrectos-->
            <center class="titulo_log">
                <figure>
                    <img src="../img/LogoImage.png" alt="Imagen" class="imageLogo">
                </figure>
                    Bienvenido a EnfSanar
                    <h4 class="titulo_titulo_log">
                        <?php
                            session_start();
                            if (isset($_SESSION['loginMessage']))
                            {
                                echo $_SESSION['loginMessage'];
                                unset($_SESSION['loginMessage']);
                            }
                        ?>
                    </h4>
            </center>
            
            <br/>
            
            <!--Formulario y datos de login-->
            <form action="log_check.php" method="POST" class="formulario_log">
                
                <div>
                    <label class="textos_log">Usuario</label> <br/>
                    <input type="text" class="inputs_log" name="usuario" placeholder="Ingrese Usuario">
                </div>
                
                <div>
                    <br/>
                    <br/>
                    <label class="textos_log">Contraseña</label> <br/>
                    <input type="password" class="inputs_log" name="contra" placeholder="Ingrese Contraseña">
                </div>
                
                <div>
                    <br/>
                    <br/> 
                    <br/>
                    <input class="btn_log" type="submit" name="ingreso" value="Ingresar">
                    <a href="../index.html" class="menu-principal" style="background-color: red;">Cancelar</a>                
                </div>
                
            </form>
            
            
        </div>
        
    </center>
    
</body>

</html>