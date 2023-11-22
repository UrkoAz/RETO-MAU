<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Cronómetro</title>
</head>
<body>
<img src="../img/maulogo.jpg" alt="logo" width="100" height="100">
    <input type="hidden" name="valorCronometro" value=""/>
    <div id="cronometro">00:00:00</div>
    <div class="textoVuelta">Nº de Vuelta: </div>
    <div class="inputVuelta"><input class="cajonVuelta" type="number" name="n_vuelta" maxlength="20" minlength="1" required="required"></div>
    <table class="tablaCrono">
        <tr>
            <td><button id="Btn_Iniciar">Iniciar</button></td>
            <td><button id="Btn_Detener">Detener</button></td>
            <td><button id="Btn_Reiniciar">Reiniciar</button></td>
            <td><button type="submit" id="Btn_Enviar">Enviar</button></td>
        </tr>
    </table>

    <script src="../js/script.js">
    </script>
</body>
</html>