<?php
$db = new PDO('sqlite:database.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
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

        $password = $stmt->fetchColumn();

        if ($password != $_POST['password']) {
            header("Location: /login.php?error=invalidCredentials");
        } else {
            $sql = "SELECT name FROM users WHERE email = :email";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->execute();

            $name = $stmt->fetchColumn();

            setcookie("sessionId", );
            header("Location: /home/");
        }
    }
} else {
    header("Location: /login.php");
}