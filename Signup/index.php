<?php
    include './../prv/loader.php';
    echo loadTop("login-signup", "signup");
?>
    <main>
        <div class="main">
            <div class="title">Sign up</div>
            <form action="/prv/signup.php" method="post">
                <label for="name">Your name:</label>
                <input type="text" name="name">
                <label for="email">Email:</label>
                <input type="email" name="email">
                <label for="password">Password:</label>
                <div>
                    <input type="password" name="password" class="passInput">
                    <button class="showPass"><i class="fa-regular fa-eye"></i></button>
                </div>
                <button type="submit" class="submit">Sign up</button>
            </form>
            <?php 
                if (isset($_GET["error"])) {
                    $error = $_GET["error"];
                    if ($error == "emptyFields") {
                        echo '<div class="error">Please fill in all fields</div>';
                    } else if ($error == "emailExists") {
                        echo '<div class="error">Email already exists</div>';
                    }
                }
            ?>
        </div>
        <img src="../assets/Kodee_Assets_Digital_Kodee-sitting.svg" alt="">
    </main>
<?php
    if (isset($_GET["redirected"])) {
        if ($_GET["redirected"] == "true") echo '<div class="hello activated right"></div>';
    } else {
        echo '<div class="hello"></div>';
    }
    ?>
    <script>
        const showPass = document.querySelector(".showPass");
        const passInput = document.querySelector(".passInput");

        showPass.addEventListener("click", e => {
            e.preventDefault()
            if (passInput.type === "password") {
                passInput.type = "text";
            } else {
                passInput.type = "password";
            }
        })
    </script>
<?php
    echo loadFooter();
    ?>