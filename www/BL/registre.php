<?php
session_start();

require_once('DL/database.php');
require_once('BL/UsuarisBL.php'); 
require_once('helpers/valida.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $username = $_POST["username"];

    $email = sanitizeEmail($email);
    $password = sanitizePassword($password);
    $username = sanitizeUsername($username);

    if (validaEmail($email) && validaPassword($password) && validaUsername($username)) {

        $db = new Database();

        if ($db->isEmailRegistered($email)) {
            $_SESSION["errorNumber"] = 4; 
            $_SESSION["errorMsg"] = "El correo electrónico ya está registrado";

            header("Location: error.php");
            exit();
        }

        if ($db->isUsernameTaken($username)) {
            $_SESSION["errorNumber"] = 5;
            $_SESSION["errorMsg"] = "El nombre de usuario ya está en uso";

            header("Location: error.php");
            exit();
        }

        $user = new Usuario($email, $password, $username);

        if ($db->insertUser($user)) {

            $_SESSION['user_id'] = $username->getId();
            $_SESSION['username'] = $username->getUsername();

            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION["errorNumber"] = 2;
            $_SESSION["errorMsg"] = "Error al registrar en la base de datos";

            header("Location: error.php");
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
