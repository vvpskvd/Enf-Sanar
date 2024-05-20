<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="icon" href="LogoImageWebl.ico" type="image/x-icon">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    
    <center>
        
        <div class="formulario">
            
            <center class="titulo_log">
                <figure>
                    <img src="ImageLogo.png" alt="Imagen" class="imageLogo">
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
                    <input class="btn_cancelar" type="submit" name="cancelar" value="Cancelar">
                </div>
                
            </form>
            
            
        </div>
        
    </center>
    
</body>

</html>