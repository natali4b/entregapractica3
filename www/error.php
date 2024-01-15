<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            background-color: #cad2c5;
            font-family: Arial, sans-serif;
            margin: 20px;
            align-items: center;
        }

        .container {
            display: flex;
            justify-content: space-around;
        }

        .login-logo {
            text-align: center;
            margin-top: -20px;
            margin-bottom: 18px;
        }

    </style>
</head>

<?php
session_start();

$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : 'Error desconocido';

unset($_SESSION['error_message']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <!-- modificar estilo -->
</head>
<body>
    <h1>Error</h1>
    <p><?php echo $error_message; ?></p>
    <!-- modificar estilo -->
</body>
</html>
