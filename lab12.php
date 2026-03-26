<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаб12</title>
</head>
<body>
    <?php
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
