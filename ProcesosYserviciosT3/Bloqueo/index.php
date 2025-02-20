<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="estilo.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Inicio de Sesión</h2>
    <form action="login.php" method="post">
        <label for="username">Usuario:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>
