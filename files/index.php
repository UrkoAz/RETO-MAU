<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../js/script.js"></script>
</head>
<body onload="alertCookies()">
    <table border="1px">
        Usuario: <input type="text" name="usuariologin" placeholder="Introduzca su usuario" required="required"/></br>  
        Contrase&ntilde;a: <input type="password" name="contralogin" required="required"/></br>
        <input type="submit" onclick="login()" name="btn_inises" value="Iniciar Sesión"></br>
        <input type="submit" name="btn_registro" value="Registrarse">
        <tr>
                <td><a href="buscador.php" target="_self"><button>BUSCAR</button></a></td>
                <td><a href="formulario_equipo.php" target="_self"><button>ALTA EQUIPO</button></a></td>
                <td><a href="formulario_corredor.php" target="_self"><button>ALTA CORREDOR</button></a></td>
                <td><a href="cronometro.php" target="_self"><button>CRONOMETRO</button></a></td>
        </tr>
    </table>
</body>
</html>