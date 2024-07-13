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
        ["name" => "Quizzes", "selected" => false],
        ["name" => "Join", "selected" => false],
        ["name" => "Host", "selected" => false],
        ["name" => "Create", "selected" => false],
        ["name" => "About", "selected" => false],
        ["name" => "Login", "selected" => false],
        ["name" => "Signup", "selected" => false],
    ];
    switch ($currentSection) {
        case "quizzes":
            $sections[0]["selected"] = true;
            break;
            case "join":
                $sections[1]["selected"] = true;
                break;
                case "host":
                    $sections[2]["selected"] = true;
                    break;
                    case "create":
                        $sections[3]["selected"] = true;
                        break;
                        case "about":
                            $sections[4]["selected"] = true;
                            break;
                            case "login":
                                $sections[5]["selected"] = true;
                                break;
                                case "signup":
                                    $sections[6]["selected"] = true;
                                    break;
        default:
            break;
    }

    $sectionsHTML = "";
    foreach ($sections as $section) {
        $name = $section["name"];
        if ($section["selected"]) {
            $sectionsHTML .= "<div data-link='/$name/' class='section selected'>$name</div>";
        } else {
            $sectionsHTML .= "<div data-link='/$name/' class='section'>$name</div>";
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
