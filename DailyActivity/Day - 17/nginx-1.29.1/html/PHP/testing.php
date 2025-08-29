<?php
echo "Eter the number 1 50 7.";
$x = (int) trim(fgets(STDIN));
switch ($x) {
    case 1:
        echo "sunday";
        break;
    case 2:
        echo "Monday";
        break;
    case 3:
        echo "Tuesday";
        break;
    case 4:
        echo "Wednesday";
        break;
    case 5:
        echo "Thursday";
        break;
    case 6:
        echo "Friday";
        break;
    case 7:
        echo "Staturday";
        break;
    default:
        echo "your choice is not exsist";
}
?>