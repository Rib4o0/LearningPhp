<?php
function loadHeader($currentSection = "none") : string {
    $topSkeleton = "
    <header>
        <div data-link='/index.php' class='brand'>
            <img src='https://seeklogo.com/images/K/kotlin-logo-6A9E0484CA-seeklogo.com.png' alt='' class='logo'>
            <div class='title'>Küizer</div>
        </div>
        <div class='sections'> 
    ";

    $bottomSkeleton = "
        </div>
        <i class='fa-solid fa-bars dropdown'></i>
    </header>";

    $sections = [
        ["name" => "Quizzes", "selected" => 1],
        ["name" => "Join", "selected" => 1],
        ["name" => "Host", "selected" => 1],
        ["name" => "Create", "selected" => 1],
        ["name" => "About", "selected" => 1],
        ["name" => "Login", "selected" => 1],
        ["name" => "Signup", "selected" => 1],
    ];
    switch ($currentSection) {
        case "quizzes":
            $sections[0]["selected"] = 2;
            break;
            case "join":
                $sections[1]["selected"] = 2;
                break;
                case "host":
                    $sections[2]["selected"] = 2;
                    break;
                    case "create":
                        $sections[3]["selected"] = 2;
                        break;
                        case "about":
                            $sections[4]["selected"] = 2;
                            break;
                            case "login":
                                $sections[5]["selected"] = 2;
                                break;
                                case "signup":
                                    $sections[6]["selected"] = 2;
                                    break;
        default:
            break;
    }
    if (session_status() == PHP_SESSION_ACTIVE) {
        if (isset($_SESSION['session_id'])) {
            $sections[5]["selected"] = 3;
            $sections[6]["selected"] = 4;
        } else {
            if ($currentSection !== "login" && $currentSection !== "signup" && $currentSection !== "home") {
                header("Location: /?error=You%20have%20to%20be%20logged%20in%20to%20access%20this%20page&redirected=true");
                exit();
            }
        }
    } else {
        if ($currentSection !== "login" && $currentSection !== "signup" && $currentSection !== "home") {
            header("Location: /?error=You%20have%20to%20be%20logged%20in%20to%20access%20this%20page&redirected=true");
            exit();
        }
    }

    $sectionsHTML = "";
    foreach ($sections as $section) {
        $name = $section["name"];
        if ($section["selected"] === 2) {
            $sectionsHTML .= "<div data-link='/$name/' class='section selected'>$name</div>";
        } else if ($section["selected"] === 1) {
            $sectionsHTML .= "<div data-link='/$name/' class='section'>$name</div>";
        } else if ($section["selected"] === 3) {
            $sectionsHTML .= "<div class='section'>Settings</div>";
        } else if ($section["selected"] === 4) {
            $username = $_SESSION["name"];
            $sectionsHTML .= "<div class='loggedInAs'>Logged in as $username</div>";
        }
    }
    return $topSkeleton . $sectionsHTML . $bottomSkeleton;
}

function loadHead($styleFileDir, $baseFolder = false) : string {
    if ($baseFolder) {
        $headerCssDir = 'styles/header.css';
    } else {
        $headerCssDir = './../styles/header.css';
    }
    $styleFileDir = "styles/$styleFileDir";
    if (!$baseFolder) $styleFileDir = "./../../$styleFileDir";
    return "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Kuizer</title>
        <link rel='stylesheet' href='$headerCssDir'>
        <link rel='stylesheet' href='$styleFileDir.css'>
        <script src='https://kit.fontawesome.com/30d2125a90.js' crossorigin='anonymous'></script>
        <script src='/prv/base.js' defer></script>
    </head>";
}

function loadTop($styleFileDir, $currentSection, $InRootFolder = false) : string {
    return loadHead($styleFileDir, $InRootFolder) . "<body>" . loadHeader($currentSection);
}

function loadFooter() : string {
    return '
    </body>
    </html>';
}
