<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number1 = $_POST['num1'];
        $number2 = $_POST['num2'];
        $operation = $_POST['operator'];

        switch ($operation) {
            case "addition":
                $result = $number1 + $number2;
                break;
                case "subtraction":
                    $result = $number1 - $number2;
                    break;
                    case "multiplication":
                        $result = $number1 * $number2;
                        break;
                        case "division":
                            $result = $number1 / $number2;
                            break;
            default:
            $result = "Invalid operation";
        }
    }