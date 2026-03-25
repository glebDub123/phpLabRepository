<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор</title>
    <style>
        body {
            background-color: #f5f5f5;
            justify-content: center;
            align-items: center;
            
            margin: 0;
            width:70%;
        }
        
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
        }
        
        .form-group {
            margin: 20px;
        }
        
        
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }
        

                
        button {
            width: 100%;
            padding: 12px;
            background-color: blue;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            margin: 10px;
        }
        .calculator-buttons{
            display:flex;
         }
        

    </style>
</head>
<body>
        <?php
            if (isset($_POST)) {
                $operation = $_POST['operation'];
                $num1 = $_POST['firstNum'];
                $num2 = $_POST['secondNum'];
                if(empty($num1) || empty($num2)){
                    $result = "Введите числа";
                }
                else{
                switch ($operation) {
                    case 'add':
                        $result = $num1 + $num2;
                        break;
                    case 'subtract':
                        $result = $num1 - $num2;
                        break;
                    case 'multiply':
                        $result = $num1* $num2;
                        break;
                    case 'divide':
                        if ($num2== 0) {
                            $result = 'Деление на ноль невозможно';
                        } 
                        else {
                            $result = $num1 / $num2;
                        }
                        break;
                }
                }
                

            }

        ?>
        <h1>Калькулятор</h1>
        
        <form method="POST" action="">
            <div class="form-group">
                <input name="firstNum" type="number"> 
                <input type="number" name="secondNum">
            </div>
            
            <div class="calculator-buttons">
                <button type="submit" name="operation" value="add">+</button>                
                <button type="submit" name="operation" value="subtract">-</button>
                <button type="submit" name="operation" value="multiply">*</button>
                <button type="submit" name="operation" value="divide">/</button>
            </div>

            <div>
                <?php   
                    echo "<div>Результат: $result</div>";
                ?>
            </div>
            

            
        </form>
        
    </div>
</body>
</html>
