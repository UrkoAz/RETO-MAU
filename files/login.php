<?php
include_once '../persistence/MySQLPDO.class.php';
session_start(); // Inicia la sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica las credenciales (esto puede variar según tu lógica de autenticación)
    $username = "usuario"; // Reemplaza con tu nombre de usuario
    $password = "contrasena"; // Reemplaza con tu contraseña

    if ($_POST["username"] == $username && $_POST["password"] == $password) {
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        header("location: welcome.php"); // Redirecciona a la página de bienvenida
        exit();
    } else {
        $error = "Credenciales incorrectas";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Usuario:</label>
        <input type="text" name="username" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Iniciar Sesión">
    </form>

    <?php
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>
</body>
</html>