<!DOCTYPE html>
<html lang="en">
<head>
    <!--Inyeccion archivo CSS-->
    <link rel="stylesheet" href="Login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EnfSanar</title>
</head>

<body>

    <!--Formulario General-->
    <div id="container">
        <form action="action_page.php" method="post">

        <div>
        <!--Usuario-->
        <label for="usuario"><b>Username</b></label> <br>
        <input type="text" placeholder="Ingrese Usuario" name="usuario" required>

        <br>
        <br>

        <!--Contraseña-->
        <label for="contra"><b>Password</b></label> <br>
        <input type="password" placeholder="Ingrese Contraseña" name="contra" required>

        <br>
        <br>

            <button type="submit" class="login-button">Iniciar Sesion </button>

            

            <label>  <input type="checkbox" checked="checked" name="remember"> Remember me  </label> 

            </div>

            <!--Container para CANCELAR Y OLVIDASTE CONTRASEÑA-->

            <div class="btnCancelar-btnOlvidasteContra">

                <button type="button" class="cancelbtn">Cancel</button>
                <span class="psw"> <a href="#">Olvidaste la contraseña?</a></span>

            </div>

        </form>

    </div>

</body>

</html>