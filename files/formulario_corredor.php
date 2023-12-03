<!DOCTYPE html>
<html lang="es">
<title>Alta de corredor</title>
<head>
    <link rel="icon" href="../img/maulogo.jpg" type="image/icon type">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <script src="../js/script.js"></script>
</head>
<body>
<img src="../img/maulogo.png" alt="logo" width="200" height="200">
    <?php
        include_once '../persistence/MySQLPDO.class.php';
        include_once '../entity/Equipo.class.php';
        MySQLPDO::connect();
        $result = MySQLPDO::buscarEquipos();
        
    ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="altaCorredorForm" >
        Nombre: <input type="text" name="nombre" maxlength="255" required="required"></br>
        Apellido: <input type="text" name="apellido" maxlength="255" required="required"></br>
        Usuario: <input type="text" name="usuario" maxlength="255" required="required"></br>
        Contrase&ntilde;a: <input type="password" name="contrasena" maxlength="255" required="required"></br>
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
            <?php
            //ALTA DE CORREDOR
            if (isset($_POST['btn_alta'])){
                //incluimos 
                include_once '../persistence/MySQLPDO.class.php';
                include_once '../entity/Corredor.class.php';

                    //variables
                    $varNombre = $_POST['nombre'];
                    $varApellido = $_POST['apellido'];
                    $varUsuario = $_POST['usuario'];
                    $varContrasena = $_POST['contrasena'];
                    $varEquipoId = $_POST['fk_equipo_id'];

                //nuevo objeto corredor
                $objetoCorredor = new Corredor();

                $objetoCorredor->setNombre($varNombre);
                $objetoCorredor->setApellido($varApellido);
                $objetoCorredor->setUsuario($varUsuario);
                $objetoCorredor->setContrasena($varContrasena);
                $objetoCorredor->setEquipo_id($varEquipoId);

                MySQLPDO::connect();
                $result = MySQLPDO::insertCorredor($objetoCorredor);

                if ($result != 0) {
                    echo 'Corredor introducido correctamente';
                } else {
                    echo 'ERROR: No se ha podido introducir el corredor';
                }}
            ?>
    </form>
        <button id="Btn_Atras" onclick="volverAtras()">Volver atr&aacute;s</button>
</body>
</html>