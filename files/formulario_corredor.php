<!DOCTYPE html>
<html lang="es">
<title>Alta de corredor</title>
<head>
    <link rel="icon" href="../img/maulogo.jpg" type="image/icon type">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
    <?php
        include_once '../persistence/MySQLPDO.class.php';
        include_once '../entity/Equipo.class.php';
        MySQLPDO::connect();
        $result = MySQLPDO::buscarEquipos();
        
    ?>
    <form method="post" action="alta_corredor.php" id="altaCorredorForm" >
        Nombre: <input type="text" name="nombre" maxlength="255" required="required"></br>
        Apellido: <input type="text" name="apellido" maxlength="255" required="required"></br>
        Usuario: <input type="text" name="usuario" maxlength="255" required="required"></br>
        Contrase&ntilde;a: <input type="password" name="contrasena" maxlength="255" required="required"></br>
        Huella: <input type="text" name="huella" maxlength="255" required="required"></br>
        Equipo: <select name="fk_equipo_id">
                    <?php
                    /*bucle para que salgan tantas opciones como equipos hay en la BBDD*/
                    foreach ($result as $fila){
                        extract ($fila);
                    ?>
                    <option value="<?php echo $ID_E ?>" ><?php echo $NOMBRE_E ?></option> <!-- en el value ponemos la ID y queremos que en la opción salga el nombre del equipo-->
                    <?php
                    }
                    ?>
                </select>
        <tr>
        <input type="submit" name="btn_alta" value="Alta">
    </form>
</body>
</html>