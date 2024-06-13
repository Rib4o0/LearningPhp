<?php
$db = new PDO('sqlite:database.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        header("Location: /login.php?error=emptyFields");
        exit();
    }

    $sql = "SELECT COUNT(*) FROM users WHERE email = :email";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':email', $_POST['email']);

    $stmt->execute();

    $count = $stmt->fetchColumn();

    if ($count < 1) {
        header("Location: /login.php?error=invalidCredentials");
        exit();
    } else {
        $sql = "SELECT password FROM users WHERE email = :email";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->execute();

        $row = $stmt->fetchColumn();

        echo $row;
    }
} else {
    header("Location: /login.php");
}