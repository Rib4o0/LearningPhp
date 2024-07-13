<?php
include "./../prv/loader.php";
session_start();
echo loadTop("null","create");
?>
<?php
if (session_status() == PHP_SESSION_ACTIVE) {
    if (isset($_SESSION['session_id'])) {
        echo "User is already logged in.";
    } else {
        echo "No user session found.";
    }
} else {
    echo "Session is not active.";
}
echo session_status();
?>
<div class="loggedInAs">Logged in as: Rosen</div>
<?php
if (isset($_GET["redirected"])) {
    if ($_GET["redirected"] == "true") echo "<div class=\"hello activated right\"></div>";
} else {
    echo "<div class=\"hello\"></div>";
}
echo loadFooter();
?>
