<?php
$db = new PDO('sqlite:database.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        header("Location: /Login/index.php?inputError=emptyFields");
        exit();
    }

    $rand = rand(100000,999999);
    $sql = "UPDATE users SET sessionID = $rand WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->execute();

    $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count < 1) {
        header("Location: /Login/index.php?inputError=invalidCredentials");
        exit();
    } else {
        $sql = "SELECT password FROM users WHERE email = :email";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->execute();

        $password = $stmt->fetchColumn();

        if ($password !== $_POST['password']) {
            header("Location: /Login/index.php?inputError=invalidCredentials");
        } else {
            session_start();

            $_SESSION["session_id"] = $rand;
            $sql = "SELECT name FROM users WHERE email = :email";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->execute();
            $_SESSION["name"] = $stmt->fetchColumn();

            header("Location: /home/");
            session_write_close();
            exit();
        }
    }
} else {
    header("Location: /Login/index.php");
}