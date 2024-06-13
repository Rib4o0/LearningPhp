<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuizer</title>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/style.css">
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
        <div data-link="/login.php" class="section">Login</div>
        <div data-link="/signup.php" class="section">Sign up</a>
        </div>
</header>
<section class="intro">
    <div class="main">
        <div class="title">Küizer</div>
        <div class="desc">Intuitive. Educational. Fun.</div>
        <div data-link="/Quizes/" class="started">Get Started</div>
    </div>
    <img src="assets/Kodee_Assets_Digital_Kodee-greeting.svg" alt="">
</section>
<section class="latestQuizes">
    <div class="title">Latest Quizes</div>
    <div class="quizes">
        <div class="quiz">
            <img src="https://tourismmedia.italia.it/is/image/mitur/20220127150143-colosseo-roma-lazio-shutterstock-756032350-1?wid=1600&hei=900&fit=constrain,1&fmt=webp" alt="">
            <div class="text">
                <div class="title">Ancient History</div>
                <div class="questionAmount">20 questions</div>
                <div class="desc">A quiz about the ancient history of Rome.</div>
            </div>

        </div>
        <div class="quiz">
            <img src="https://ravebonfire.com/wp-content/uploads/2023/08/aditya-chinchure-ZhQCZjr9fHo-unsplash-scaled.jpg" alt="">
            <div class="text">
                <div class="title">The RAVE quiz</div>
                <div class="questionAmount">50 questions</div>
                <div class="desc">DO THIS QUIZ WHILE AT A RAVE TO HAVE FUN!!!!!!</div>
            </div>
        </div>
        <div class="quiz">
            <img src="https://tourismmedia.italia.it/is/image/mitur/20220127150143-colosseo-roma-lazio-shutterstock-756032350-1?wid=1600&hei=900&fit=constrain,1&fmt=webp" alt="">
            <div class="text">
                <div class="title">Ancient History</div>
                <div class="questionAmount">20 questions</div>
                <div class="desc">A quiz about the ancient history of Rome.</div>
            </div>
        </div>
        <div class="quiz">
            <img src="https://www.wwf.org.uk/sites/default/files/styles/hero_s/public/2023-09/Tropical.jpg?h=790be497&itok=JbFUM0J_" alt="">
            <div class="text">
                <div class="title">The amazon jungle</div>
                <div class="questionAmount">10 questions</div>
                <div class="desc">Test your knowledge about the amazon jungle with this quick 10 question quiz</div>
            </div>
        </div>
    </div>
    <div data-link="/Quizes" class="more">More</div>
</section>
<section class="startToday">
    <div class="title">Start creating quizes today!</div>
    <div data-link="/create" class="started">Get Started</div>
</section>
<footer class="contactUs">
    <div class="main">
        <div class="title">Contact us</div>
        <form action="/contactUs.php" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" class="email">
            <label for="name">Your name:</label>
            <input type="text" name="name" class="name">
            <label for="message">Message:</label>
            <input type="text" name="message" class="message">
            <button type="submit">Send <3</button>
        </form>
    </div>
    <img src="assets/Kodee_Assets_Digital_Kodee-sharing.svg" alt="">
</footer>
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