<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаб12</title>
</head>
<body>

    <form method="post">
        <label>Первая дата:</label>
        <input type="date" name="date1" required><br>
        
        <label>Вторая дата:</label>
        <input type="date" name="date2" required><br>
        
        <input type="submit" value="Сравнить">
    </form>
    <?php
    //Часть 2
    echo "</br>10:25:00 25 марта 2025 в формате timestamp - ".mktime(10,25,0,3,25,2025)."</br>";
    
    echo "</br>Разница между 08:05:59 2 октября 1990 и сейчас - ".time() - mktime(8,5,59,2,10,1990)."</br>";

    echo "</br>Текущая дата в нужном формате - ".date('Y.m.d')."</br>";
    
    echo "</br>1 сентября текущего года - ".date('Y.m.d', mktime(0, 0, 0, 1, 9, 26))."</br>";

    echo "</br> Какой день недели был 2 февраля 2000 года - ".date('l', strtotime('2000-02-02'))."</br>";

    $week = [0 => 'Воскресенье',1 => 'Понедельник',2 => 'Вторник',3 => 'Среда',4 => 'Четверг',5 => 'Пятница', 6 => 'Суббота'];

    $day1 = date('w',strtotime('2016-06-12'));
    $day2 = date('w',strtotime('2007-01-10'));
    echo "</br> 12.06.2016 - " . $week[$day1] . "<br>";
    echo "</br>День рождение - " . $week[$day2] . "<br>";
    
            
    
    if (isset($_POST['date1']) && isset($_POST['date2'])) {
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];
        
        echo "Первая дата: $date1<br>";
        echo "Вторая дата: $date2<br><br>";
        
        if ($date1 > $date2) {
            echo "Большая дата: $date1";
        } elseif ($date2 > $date1) {
            echo "Большая дата: $date2";
        } else {
            echo "Даты равны";
        }

        echo "</br>";


    }
    
    $needDate = "2006-12-3";
    echo "</br>$needDate в формате день-месяц-год - ".date('d-m-Y', strtotime($needDate))."</br>";     


    $date = date_create('2000-02-03');
    date_modify($date,"2 days");
    date_modify($date,"3 days 1 month");
    date_modify($date,"1 year");
    date_modify($date,"-3 days");

    echo "</br>".date_format($date,"d.m.Y")."</br>";
            
    $now = time();

    $newYear = mktime(0, 0, 0, 1, 1,2027);

    $seconds = $newYear - $today;

    $days = floor($seconds / (60 * 60 * 24));

    echo "</br>Дней до нового года - $days</br></br>"; 
    //Часть 1
    try {
        $file = fopen("test.txt", "r");
        if ($file == false) {
            throw new RuntimeException("Не удалось открыть файл");
        }
        
            $division = 12 / 0;
            
            $countries = ['Spain' => 'Madrid', 'Russia' => 'Moscow', "Germany" => "Berlin"];
            
            $USA = $countries['USA'];
            
            if ($USA == null) {
                throw new InvalidArgumentException("Обращение к несуществующему элементу");
            }
    
    }   
    catch (RuntimeException $ex) {
        echo 'Обработчик исключения fopen: ' . $ex->getMessage() . "</br>";
    } 
    catch (DivisionByZeroError $er) {
        $file = fopen("log.txt", "a+");
        fwrite($file, $er->getMessage() . "\n");
        fclose($file);
        echo "Ошибка деления на ноль записана в log.txt</br>";
    } 
    catch (InvalidArgumentException $ex) {
        echo "</br> Обработка несуществующего элемента: " . $ex->getMessage() . "</br>";
    }
?>
</body>
</html>
