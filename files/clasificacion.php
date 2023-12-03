<!DOCTYPE html>
<title>Clasificaci&oacute;n</title>
<head>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" href="../img/maulogo.jpg" type="image/icon type">
</head>
<body>
    <?php
    include_once '../persistence/MySQLPDO.class.php';
    include_once '../entity/Vuelta.class.php';
    $num_clasificacion = 1;
    MySQLPDO::connect();
    $result = MySQLPDO::mostrarClasificacion();
    ?>
    <div class="tiempostotales" >TIEMPOS TOTALES</div><br>
    <table class="tablaClasificacion" border="1px">
        <tr>
            <th>Clasificacion</th>
            <th>USUARIO</th>
            <th>TIEMPO</th>
            <th>EQUIPO</th>
        </tr>
        <?php
        foreach($result as $filas){
            extract ($filas);
        ?>
        <tr>
            <td><?php echo $num_clasificacion ?></td>
            <td><?php echo $USUARIO_C; ?></td>
            <td><?php echo $TIEMPO_TOTAL; ?></td>
            <td><?php echo $NOMBRE_E; ?></td>
        </tr>
        <?php
        $num_clasificacion = $num_clasificacion + 1;    
        }
        ?>
    </table><br>
    <div> <a class="btn_crono" href="cronometro.php" target="_self"><button>CRON&Oacute;METRO</button></a></div>
</body>
</html>