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
    $num_clasificacion_equipos = 1;
    MySQLPDO::connect();
    $result = MySQLPDO::mostrarClasificacionEquipo();
    ?>
    <div class="tiempostotales" >TIEMPOS TOTALES POR EQUIPOS</div><br>
    <table class="tablaClasificacion">
        <tr>
            <th>Clasificacion</th>
            <th>EQUIPO</th>
            <th>TIEMPO</th>
            <th>VUELTAS</th>
        </tr>
        <?php
        foreach($result as $filas){
            extract ($filas);
        ?>
        <tr>
            <td><?php echo $num_clasificacion_equipos ?></td>
            <td><?php echo $NOMBRE_E; ?></td>
            <td><?php echo $TIEMPO_TOTAL; ?></td>
            <td><?php echo $VUELTAS_TOTALES; ?></td>
        </tr>
        <?php
        $num_clasificacion_equipos = $num_clasificacion_equipos + 1;    
        }
        ?>
    </table><br>
    <?php
    $num_clasificacion = 1;
    MySQLPDO::connect();
    $result = MySQLPDO::mostrarClasificacion();
    ?>
    <div class="tiempostotales" >TIEMPOS TOTALES POR CORREDOR</div><br>
    <table class="tablaClasificacion">
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
    <div> <a class="btn_crono" href="cronometro.php" target="_self"><button>CRON&Oacute;METRO</button></a></div><br>
    <a href="../index.php" target="_self"><button>Inicio de sesi&oacute;n</button></a>
</body>
</html>