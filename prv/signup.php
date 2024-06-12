<?php 
$db = new PDO('sqlite:database.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ( empty($name) || empty($email) || empty($password)) {
        header("Location: /signup.php?error=emptyFields");
    }

    $db->exec("INSERT INTO users (name, email, password) VALUES ($name, $email, $password");
    echo "hello";
}