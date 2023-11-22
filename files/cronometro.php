<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/estilos.css">
    <title>Cronómetro</title>
</head>
<body>
    <h2>Cronómetro</h2>
    <input type="hidden" name="valorCronometro" value=""/>
    <div id="cronometro">00:00:00</div>
    <table class="tablaCrono">
        <tr>
            <td><button id="Btn_Iniciar">Iniciar</button></td>
            <td><button id="Btn_Detener">Detener</button></td>
            <td><button id="Btn_Reiniciar">Reiniciar</button></td>
            <td><button id="Btn_Enviar">Enviar</button></td>
            <td><button id="Btn_Vueltas">Nueva Vuelta</button></td>
        </tr>
    </table>

    <script src="../js/script.js">
    </script>
</body>
</html>