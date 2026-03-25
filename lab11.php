<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаб 11</title>

</head>
<body>
    <?php
        touch("test.txt");

        $file = fopen("test.txt","w");
        fwrite($file,"Привет, мир!");
        fclose($file);        

        $file = fopen("test.txt","r");
        echo fgets($file)."</br>";
    ?>
</body>
</html>
