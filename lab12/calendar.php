<html>
<head>
    <title>Календарь</title>
</head>
<body>
<?php
$monthdays = date("t");
$weeks = $monthdays / 7;
$weeks = round($weeks, 0);
$dayofweek = date("w");
$dayofmonth = date("j");
$dayofmonthlz = date("d");
$monthlz = date("n");
$year = date("Y");
$daysarray = array("", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс
");
$month =
    array("1" => "Январь", "2" => "Февраль", "3" => "Март", "4" => "
    Апрель", "5" => "Май", "6" => "Июнь",
        "7" => "Июль", "8" => "Август", "9" => "Сентябрь", "10" => "Октя
брь", "11" => "Ноябрь", "12" => "Декабрь");

$numberDaysInMonths = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12");

$numberfirstday =
    date("w", mktime(0, 0, 0, date("m"), 1, date("Y")));

$daysInLeapYear = array(31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
$daysInNonLeapYear = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);


if (date("L")) {
    for ($i = 0; $i < 12; $i++) {
        drawMonth($numberDaysInMonths[$i], date("w", mktime(0, 0, 0, $numberDaysInMonths[$i], 1, date("Y"))), $month, $daysarray, $daysInLeapYear[$i], $year);
    }
} else {
    for ($i = 0; $i < 12; $i++) {
        drawMonth($numberDaysInMonths[$i], date("w", mktime(0, 0, 0, $numberDaysInMonths[$i], 1, date("Y"))), $month, $daysarray, $daysInNonLeapYear[$i], $year);
    }
}

function drawMonth($monthNumber, $firstDayOfMonth, $month, $daysarray, $monthdays, $year)
{
    echo "<font color=red><b>" . $month[$monthNumber] . "
(" . $year . ")</b></font>";


    echo "<table width=\"200\" border=\"0\"
cellspacing=\"0\" cellpadding=\"5\">\n\t<tr>\n";
    for ($i = 1; $i <= 7; $i++) {
        if ($i > 5) {
            echo "\t\t<td><font
color=\"#E4723A\">" . $daysarray[$i] . "</font></td>\n";
        } else {
            echo "\t\t<td>" . $daysarray[$i] . "</td>\n";
        }
    }
    echo "\t</tr>\n\t<tr>\n";
    $j = 1;
    while ($j < $firstDayOfMonth) {
        echo "\t\t<td>&nbsp;</td>\n";
        $j++;
    }
    for ($i = 1; $i <= $monthdays; $i++) {

        if ($monthNumber == date('n')) {
            if ($i == date('j')) {
                echo "\t\t<td bgcolor=\"#FF8040\"
align=\"center\"><b>" . $i . "</b></td>\n";
            } else {
                echo "\t\t<td align=\"center\">" . $i . "</td>\n";
            }
        } else
            echo "\t\t<td align=\"center\">" . $i . "</td>\n";

        if (round($j / 7) - $j / 7 == 0) {
            echo "\t</tr>\n\t<tr>\n";
        }
        $j++;
    }
    echo "\t</tr>\n</table>\n";
}

?>
</body>
</html>