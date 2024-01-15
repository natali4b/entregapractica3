<?php

function sanitizeEmail($email) {
    // Sanea el correo electrónico
    return filter_var($email, FILTER_SANITIZE_EMAIL);
}

function validaEmail($email) {
    // Valida el formato del correo electrónico
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function sanitizePassword($password) {
    // Sanea la contraseña
    return trim($password); // Elimina espacios en blanco al principio y al final
}

function validaPassword($password) {
    // Valida la longitud de la contraseña
    return strlen($password) >= 6; // Por ejemplo, la contraseña debe tener al menos 6 caracteres
}

function sanitizeUsername($username) {
    // Sanea el nombre de usuario
    return trim($username); // Elimina espacios en blanco al principio y al final
}

function validaUsername($username) {
    // Valida el nombre de usuario 
    return preg_match('/^[a-zA-Z0-9_]+$/', $username) === 1; // Por ejemplo, solo permite letras, números y guiones bajos
}
?>
