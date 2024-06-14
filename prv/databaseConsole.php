<?php

if ($_SERVER('REQUEST_METHOD') == 'HELLO') {
    $db = new PDO("sqlite:database.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    for ($i = 1; $i <= 3; $i++) {
        $id = rand(100000,999999);
        $sql = "
            UPDATE users
            SET sessionID = $id WHERE id = $i;
        ";
        $db->exec($sql);
    }
} else {
    Header("Location: /");
}

