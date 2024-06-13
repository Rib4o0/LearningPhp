<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuizer</title>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/login-signup.css">
</head>
<body>
<header>
    <div data-link="/index.php" class="brand">
        <img src="https://seeklogo.com/images/K/kotlin-logo-6A9E0484CA-seeklogo.com.png" alt="" class="logo">
        <div class="title">Küizer</div>
    </div>
    <div class="sections">
        <div data-link="/quizes/" class="section">Quizes</div>
        <div data-link="/join/" class="section">Join</div>
        <div data-link="/host/" class="section">Host</div>
        <div data-link="/create/" class="section">Create</div>
        <div data-link="/about/" class="section">About</div>
        <div data-link="/login.php" class="section selected">Login</div>
        <div data-link="/signup.php" class="section">Sign up</a>
        </div>
</header>
<main>
    <div class="main">
        <div class="title">Login</div>
        <form action="/prv/login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email">
            <label for="password">Password:</label>
            <input type="password" name="password">
            <button type="submit" class="submit">Sign up</button>
        </form>
        <?php
        if (isset($_GET["error"])) {
            $error = $_GET["error"];
            if ($error == "emptyFields") {
                echo '<div class="error">Please fill in all fields</div>';
            } else if ($error == "invalidCredentials") {
                echo '<div class="error">Incorrect email or password</div>';
            }
        }
        ?>
    </div>
    <img src="assets/Kodee_Assets_Digital_Kodee-in-love.svg" alt="">
</main>
<?php
if (isset($_GET["redirected"])) {
    if ($_GET["redirected"] == "true") echo '<div class="hello activated right"></div>';
} else {
    echo '<div class="hello"></div>';
}
?>
<script>
    const links = document.querySelectorAll("[data-link]");
    const hello = document.querySelector(".hello")

    links.forEach(link => {
        link.addEventListener("click", () => {
            hello.classList.add("activated");
            setTimeout(() => {
                window.location = link.dataset.link + `?redirected=true`;
            }, 250)
        })
    })

    setTimeout(() => {
        hello.classList.remove("activated");
        setTimeout(() => {
            hello.classList.remove("right");
        },250)
    },1)
</script>
</body>
</html>