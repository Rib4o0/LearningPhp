<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/signup.css">
</head>
<body>
    <header>
        <div data-link="/index.php" class="brand">
            <img src="https://seeklogo.com/images/K/kotlin-logo-6A9E0484CA-seeklogo.com.png" alt="" class="logo">
            <div class="title">Küizer</div>
        </div>
        <div class="sections">
            <div class="section">Quizes</div>
            <div class="section">Join</div>
            <div class="section">Create</div>
            <div class="section">About</div>
            <div class="section">Login</div>
            <div data-link="/signup.php" class="section selected">Sign up</a>
        </div>
    </header>
    <main>
        <div class="main">
        <div class="title">Sign up</div>
            <form action="" method="post">
                <label for="name">Your name:</label>
                <input type="text" name="name">
                <label for="email">Email:</label>
                <input type="email" name="email">
                <label for="password">Password:</label>
                <input type="password" name="password">
                <button type="submit" class="submit">Sign up</button>
            </form>
        </div>
        <img src="assets/Kodee_Assets_Digital_Kodee-sitting.svg" alt="">
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