<?php
$date = $_GET['date'];

if (!$date) {
    echo 'Ошибка: укажите date в формате ГГГГ-ММ-ДД';
}

$dateTime = strtotime($date);

if (!$dateTime) {
    echo 'Ошибка: неверный формат даты';
}
else{
    $days = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'];

    $dayNumber = date('N', $dateTime);
    
    echo $days[$dayNumber - 1];
}
?>
