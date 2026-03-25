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

        rename("test.txt","mir.txt");

        mkdir("folder");
        rename("mir.txt","folder/mir.txt");

        copy("folder/mir.txt","folder/world.txt");

        $size = filesize("folder/world.txt");
        echo "Размер: " . $size. " байт<br>";
        echo "Размер: " . $size / 1048576 . " МБ<br>";
        echo "Размер: " . $size / 1073741824 . " ГБ<br>";

        unlink("folder/world.txt");

        if(file_exists("folder/mir.txt") ==true){
            echo "Файл mir.txt существует <br>"; 
        }
        else{
            echo "Файл mir.txt не существует <br>"; 
        }

        if(file_exists("folder/world.txt") ==true){
            echo "Файл world.txt существует <br>"; 
        }
        else{
            echo "Файл world.txt не существует <br>"; 
        }


        mkdir("test");

        rename("test","www");

        rmdir("www");
    ?>
</body>
</html>
