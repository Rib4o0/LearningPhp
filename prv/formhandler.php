<?php 


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["passsword"]);

    echo "username: $username, password: $password";

    header("Location: ../index.php?username=$username");
}
else {
    header("Location: ../index.php");
}