<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Cronómetro</title>
</head>
<body>
<img src="../img/maulogo.png" alt="logo" width="150" height="150">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input type="hidden" id="valorCronometro" name="valorCronometro"/>
        <div id="cronometro">00:00:00</div>
        <div class="textoVuelta">Nº de Vuelta: </div>
        <div class="inputVuelta"><input class="cajonVuelta" type="number" name="n_vuelta" maxlength="20" minlength="1" required="required"></div>
    <table class="tablaCrono">
        <tr>
            <td><input type="submit" name="Btn_Enviar" id="Btn_Enviar" value="Enviar"/></td>
        </tr>
    </table>
    </form>
    <table>
            <td><button id="Btn_Iniciar">Iniciar</button></td>
            <td><button id="Btn_Detener">Detener</button></td>
            <td><button id="Btn_Reiniciar">Reiniciar</button></td>
    </table>
    <script src="../js/script.js">
    </script>
        <?php
        if (isset($_POST['Btn_Enviar'])){
        //incluimos 
        include_once '../persistence/MySQLPDO.class.php';
        include_once '../entity/Vuelta.class.php';

            //variables
            $varTiempo = $_POST['valorCronometro'];
            $varNVuelta = $_POST['n_vuelta'];


        //nuevo objeto vuelta
        $objetoVuelta = new Vuelta();

        $objetoVuelta->setTiempo($varTiempo);
        $objetoVuelta->setN_vuelta($varNVuelta);


        MySQLPDO::connect();
        $result = MySQLPDO::insertVuelta($objetoVuelta);
        }else{
            echo '0 ASEGURAO';
        }
    ?>
</body>
</html>