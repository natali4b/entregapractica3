<?php
$servername = "mysql-anna-esquerra.alwaysdata.net";
$username = "330624";
$password = "Uabuab123uab";
$dbname = "anna-esquerra_todoapp";  // Reemplaza "tu_nombre_de_base_de_datos" con el nombre real de tu base de datos

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT nom, cognom, username, email, password FROM usuaris";  // Reemplaza "tu_tabla" con el nombre real de tu tabla

$result = $conn->query($sql);

if ($result === FALSE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
} elseif ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "Nom: " . $row["nom"] . " - Cognom: " . $row["cognom"] . " - Email: " . $row["email"] . " - Password: " . $row["password"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>