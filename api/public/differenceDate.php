<?php
$date1 = $_GET['date1'];
$date2 = $_GET['date2'];

$dateTime1 = strtotime($date1);
$dateTime2 = strtotime($date2);

if (!$dateTime1 && !$dateTime2) {
    echo 'Ошибка: неверный формат даты';
}
else{
    $seconds = abs($dateTime2 - $dateTime1);
    $days = floor($seconds / 86400);

    echo $days;
}
?>
