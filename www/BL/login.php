<?php
session_start();

require_once('../DL/database.php');
require_once('UsuarisBL.php');
require_once('../helpers/valida.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $email = sanitizeEmail($email);
    $password = sanitizePassword($password);

    if (validaEmail($email) && validaPassword($password)) {
        echo "1";

        $db = new Database();

        $usuario = $db->getUserByEmail($email);

        if ($usuario && password_verify($password, $usuario->getPasswordHash())) {
            echo "2";

            $_SESSION['id_user'] = $usuario->getId();
            $_SESSION['username'] = $usuario->getUsername();

            session_regenerate_id();

            header("Location: ../dashboard.php");
            exit();
        } else {
            $_SESSION["errorNumber"] = 3;
            $_SESSION["errorMsg"] = "Credenciales inválidos";

            echo '<script>window.location.href = "../dashboard.php";</script>';
            exit();
        }
    } else {
        $_SESSION["errorNumber"] = 1;
        $_SESSION["errorMsg"] = "Datos no válidos";

        header("Location: error.php");
        exit();
    }
} else {
    header("Location: error.php");
    exit();
}
?>
