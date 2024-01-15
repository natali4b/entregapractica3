<?php

require_once("../DL/config.php");

class Database
{

    private $conn;

    public function __construct()
    

    {

        $servername = "mysql-anna-esquerra.alwaysdata.net";
        $username = "330624";
        $password = "Uabuab123uab";
        $dbname = "anna-esquerra_todoapp";

        $this->conn = new mysqli($servername, $username, $password, $dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getAll()
    {
        $sql = "SELECT nom, cognom, alies, email, password FROM base";
        return ($this->conn->query($sql));
    }

    public function insertUser($email, $password, $username)
    {
        $email = $this->conn->real_escape_string($email);
        $password = $this->conn->real_escape_string($password); 
        $sql = "INSERT INTO base (email, password, username) VALUES ('$email', '$password', '$username')";
        return ($this->conn->query($sql));
    }
    

    public function getUserByEmail($email)
{
    $email = $this->conn->real_escape_string($email);
    $sql = "SELECT * FROM usuaris WHERE email = '$email'";
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
        $usuarioData = $result->fetch_object(); // Datos del usuario como objeto estándar

        // Crea una instancia de UsuarisBL y configura sus propiedades
        $usuario = new UsuarisBL();
        $usuario->setId($usuarioData->id);
        $usuario->setUsername($usuarioData->username);
        $usuario->setPasswordHash($usuarioData->password); // Asegúrate de adaptar esto según tu estructura de datos

        return $usuario;
    } else {
        return false; // No se encontró ningún usuario con ese correo electrónico
    }
}

}
?>
