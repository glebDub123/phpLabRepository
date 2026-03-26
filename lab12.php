<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаб12</title>
</head>
<body>
    <?php
    //Часть 2
    echo "10:25:00 25 марта 2025 в формате timestamp - ".mktime(10,25,0,3,25,2025)."</br>";
    
    echo "Разница между 08:05:59 2 октября 1990 и сейчас - ".time() - mktime(8,5,59,2,10,1990)."</br>";

    echo "Текущая дата в нужном формате - ".date('Y.m.d')."</br>";
    
    echo "1 сентября текущего года - ".date('Y.m.d', mktime(0, 0, 0, 1, 9, 26))."</br>";

    echo "Какой день недели был 2 февраля 2000 года - ".date('l', strtotime('2000-02-02'))."</br>";

    

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
