<?php
include_once '../persistence/MySQLPDO.class.php';
include_once '../entity/Corredor.class.php';
//recoger parametro que lleva desde la URL
    if(!isset($_GET['id'])){
        die("ERROR: No se ha recibido el id");
    }
    $id = $_GET['id'];
    MySQLPDO::connect();
    $objetoCorredor = MySQLPDO::obtenerCorredor($id);
    if ($objetoCorredor != null){
?>
<html>
<head>
<title>login</title>
</head>
<body>
    <form method="post" action="corredor_modificado.php">
        <input type="hidden" name="id" value="<?php echo $ID_C; ?>"/>
        Nombre: <input type="text" name="nombre" 
        maxlength="255" value="<?php echo $objetoCorredor->getNombre();?>" required="required"/></br>
        Apellido: <input type="text" name="apellido" 
        maxlength="255" value="<?php echo $objetoCorredor->getApellido();?>" required="required"/></br>
        Contrase&ntilde;a: <input type="text"name="contrasena" 
        maxlength="255" value="<?php echo $objetoCorredor->getContrasena();?>" required="required"/></br>
        Huella: <input type="text" name="huella" 
        maxlength="255" value="<?php echo $objetoCorredor->getHuella();?>" required="required"/></br>
        N&uacute;mero: <input type="number" name="equipo_id" 
        max="20" min="0" value="<?php echo $objetoCorredor->getEquipo_id();?>" required="required"/></br>
        <input type="submit" name="btn_modificar" value="Modificar">
    </form>
    <?php
    } else {
        //obtenerProducto devuelve null, NO EXISTE el id en la BBDD
        echo "ERROR: No se ha encontrado el producto";
    }
    ?>
</body>
</html>