<?php
include './prv/loader.php';
session_start();
echo loadTop('main', "home", true);
?>
<section class="intro">
    <div class="main">
        <div class="title">Küizer</div>
        <div class="desc">Intuitive. Educational. Fun.</div>
        <div data-link="/Quizzes/" class="started">Get Started</div>
    </div>
    <img src="assets/Kodee_Assets_Digital_Kodee-greeting.svg" alt="">
</section>
<section class="latestQuizes">
    <div class="wrapper">
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
    </div>
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
if (isset($_GET["error"])) {
    $error = $_GET["error"];
    echo "<div class='error show'>$error</div>";
} else {
    echo "<div class='error'></div>";
}

if (isset($_GET["redirected"])) {
    if ($_GET["redirected"] == "true") echo "<div class=\"hello activated right\"></div>";
} else {
    echo "<div class=\"hello\"></div>";
}
    echo loadFooter();
?>