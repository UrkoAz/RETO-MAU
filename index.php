<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/script.js"></script>
    <link rel="icon" href="img/maulogo.jpg" type="image/icon type">
    <title>Inicio de Sesi&oacute;n</title>
</head>
<body onload="alertCookies()">
<img src="img/maulogo.png" alt="logo" width="150" height="150">
    <table border="1px">
        <form method="POST" action="files/validarUsuario.php" onsubmit="return validarUsuario()" >
        Usuario: <input type="text" name="usuariologin" placeholder="Introduzca su usuario" class="inicioses" required="required"/></br>  
        Contrase&ntilde;a: <input type="password" placeholder="Introduzca su contraseña" name="contralogin" class="inicioses"  required="required"/></br>
        <input type="submit" name="btn_inises" class="btn_inicioses" value="Iniciar Sesión"></br>
        </form>
        <a href="files/formulario_corredor.php">¡Reg&iacute;strate si no tienes cuenta!</a><br>
    </table>
</body>
</html>