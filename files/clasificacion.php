<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="../CSS/estilos.css">
</head>
<body>
    <?php
    include_once '../persistence/MySQLPDO.class.php';
    include_once '../entity/Vuelta.class.php';
    $num_clasificacion = 1;
    MySQLPDO::connect();
    $result = MySQLPDO::mostrarClasificacion();
    ?>
    <table class="tablaClasificacion" border="1px">
        <tr>
            <th>Clasificacion</th>
            <th>USUARIO</th>
            <th>TIEMPO</th>
            <th>Nº de vuelta</th>
        </tr>
        <?php
        foreach($result as $filas){
            extract ($filas);
        ?>
        <tr>
            <td><?php echo $num_clasificacion ?></td>
            <td><?php echo $USUARIO_C; ?></td>
            <td><?php echo $TIEMPO; ?></td>
            <td><?php echo $N_VUELTAS; ?></td>
        </tr>
        <?php
        $num_clasificacion = $num_clasificacion + 1;    
        }
        ?>
    </table>
</body>
</html>