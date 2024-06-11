<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main">
    <div class="title">Simple Calculator</div>
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" class="form">
        <input type="text" name="num1" class="num">
        <select name="operator" class="operator">
            <option value="addition" class="addition">+</option>
            <option value="subtraction" class="subtraction">-</option>
            <option value="multiplication" class="multiplication">*</option>
            <option value="division" class="division">/</option>
        </select>
        <input type="number" name="num2" class="num">
        <button type="submit" class="submitbtn">Calculate</button>
    </form>
</div>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $num1 = filter_input(INPUT_POST, 'num1', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $num2 = filter_input(INPUT_POST, 'num2', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $operator = htmlspecialchars($_POST['operator']);

        $errors = false;

        if (empty($num1) || empty($num2) || empty($operator)) {
            echo '<div class="error">Fill in all fields</div>';
            $errors = true;
        } else if (!is_numeric($num1) || !is_numeric($num2)) {
            echo '<div class="error">Invalid numbers</div>';
            $errors = true;
        }

        if (!$errors) {
            $sign = "";
            switch ($operator) {
                case 'addition':
                    $result = $num1 + $num2;
                    $sign = "+";
                    break;
                    case 'subtraction':
                        $result = $num1 - $num2;
                        $sign = "-";
                        break;
                        case 'multiplication':
                            $result = $num1 * $num2;
                            $sign = "*";
                            break;
                            case 'division':
                                $result = $num1 / $num2;
                                $sign = "/";
                                break;
                default:
                    echo '<div class="error">Invalid operator</div>';
                    $errors = true;
                    break;
            }
            if (!$errors) echo "<div class='output'>Result: $num1 $sign $num2 = $result</div>";
        }
    }
?>

</body>
</html>