<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearningPHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php 
        $username = $_GET["username"];
        if ($username != "") {
            header("Location: /loggedin.php?username=$username");
        }
        
    ?>
    <div class="main">
        <div class="title">Login form</div>
        <form action="/prv/formhandler.php" method="post" class="form">
            <label for="username">Username:</label>
            <input type="text" required class="username" name="username" placeholder="Example: UserName321">
            <label for="password">Password:</label>
            <input type="password" required class="password" name="password" placeholder="Example: Password123">
            <button type="submit" class="submitbtn">Submit</button>
        </form>
    </div>

</body>
</html>