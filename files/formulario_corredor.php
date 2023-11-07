<!DOCTYPE html>
<html lang="es">
<title>Alta de corredor</title>
<head>
    <link rel="icon" href="../img/maulogo.jpg" type="image/icon type">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
    <form method="post" action="alta_corredor.php">
        Nombre: <input type="text" name="nombre" maxlength="255" required="required"></br>
        Apellido: <input type="text" name="apellido" maxlength="255" required="required"></br>
        Contrase&ntilde;a: <input type="text" name="contrasena" maxlength="255" required="required"></br>
        Huella: <input type="text" name="huella" maxlength="255" required="required"></br>
        <input type="submit" name="btn_alta" value="Alta">
    </form>
</body>
</html>