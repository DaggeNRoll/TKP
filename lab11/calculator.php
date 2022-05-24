<?php //основной скрипт был перенесён в отдельный файл
global $result;

function calc($action, &$result, $first, $second)//result берётся по ссылке
{

    switch ($action) {
        case "sum":
            $result = $first + $second;
            break;
        case "min":
            $result = $first - $second;
            break;
        case "umn":
            $result = $first * $second;
            break;
        case "del":
            if (!$second) {
                exit("Второе число не введено или равно нулю
<br> <a href=calculator.phtml>Назад</a>");
            }
            $result = $first / $second;
            break;
        case "percent":
            $result = $first / 100 * $second;
            break;

        case "sqrt":
            if ($second) {
                exit("Введите только одно число! <br>
<a href=calculator.phtml>Назад</a>");
            }
            $result = sqrt($first);
            break;

        case "sin":
            if ($second) {
                exit("Введите только одно число! <br>
<a href=calculator.phtml>Назад</a>");
            }
            $result = sin(deg2rad($first));
            break;

        case "cos":
            if ($second) {
                exit("Введите только одно число! <br>
<a href=calculator.phtml>Назад</a>");
            }
            $result = cos(deg2rad($first));
            break;
        case "tg":
            if ($second) {
                exit("Введите только одно число! <br>
<a href=calculator.phtml>Назад</a>");
            }
            $result=tan(deg2rad($first));
            break;

        case "ctg":
            if ($second) {
                exit("Введите только одно число! <br>
<a href=calculator.phtml>Назад</a>");
            }
            $result=1/tan(deg2rad($first));
            break;
    }
}

$action = $_REQUEST["action"];
$first = $_REQUEST["first"];
$second = $_REQUEST["second"];

calc($action, $result, $first, $second);
?>

<html lang="ru">
<table border="1" cellspacing="2" cellpadding="2">
    <tr>
        <td>Результат:
        </td>
        <td>
            <div align="center">
                <?php
                echo "$result";
                ?>
            </div>
        </td>
    </tr>
</table>
</html>
