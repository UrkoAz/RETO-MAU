<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../js/script.js"></script>
</head>
<body onload="alertCookies()">
    <table border="1px">
        <form method="POST" action="validarUsuario.php" onsubmit="return validarUsuario()" >
        Usuario: <input type="text" name="usuariologin" placeholder="Introduzca su usuario" required="required"/></br>  
        Contrase&ntilde;a: <input type="password" name="contralogin" required="required"/></br>
        <input type="submit" name="btn_inises" value="Iniciar Sesión"></br>
        </form>
        <a href="formulario_corredor.php">¡Reg&iacute;strate si no tienes cuenta!</a><br>
    </table>
</body>
</html>