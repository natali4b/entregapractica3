<?php
$servername = "mysql-anna-esquerra.alwaysdata.net";
$username = "330624";
$password = "Uabuab123uab";
$dbname = "anna-esquerra_todoapp";

$conn = new mysqli($servername, $username, $password, $dbname);

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO usuaris (username, email, password) VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    header("Location: dashboard.php");
    exit(); 
} else {
    echo "Error al insertar datos: " . $conn->error;
}

$conn->close();
?>