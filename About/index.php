<?php
    include "./../prv/loader.php";
    echo loadTop("about", "about");
    ?>

<section>

</section>

<?php
if (isset($_GET["redirected"])) {
    if ($_GET["redirected"] == "true") echo "<div class=\"hello activated right\"></div>";
} else {
    echo "<div class=\"hello\"></div>";
}
echo loadFooter();
?>
