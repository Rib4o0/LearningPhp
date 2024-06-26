<?php 
$db = new PDO('sqlite:database.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ( empty($name) || empty($email) || empty($password)) {
        header("Location: /signup.php?error=emptyFields");
        exit();
    }

    $sql = "SELECT COUNT(*) FROM users WHERE email = :email";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':email', $_POST['email']);

    $stmt->execute();

    $count = $stmt->fetchColumn();

    if ($count > 0) {
        header("Location: /signup.php?error=emailExists");
        exit();
    }

    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':password', $_POST['password']);

    $stmt->execute();

    header("Location: /login.php");
} else {
    header("Location: /signup.php");
}