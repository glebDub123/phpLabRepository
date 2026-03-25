<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <style>
        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        
        .register-form {
            margin:30px;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
            font-size: 14px;
            font-weight: bold;
        }
        
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }
        
        select {

            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }
        input::placeholder {
            color: #999;
        }

        input:invalid {
            border: 2px solid red;
        }
                
        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        
        button:hover {
            background-color: #45a049;
        }
        
        .description {
            text-align: center;
            color: #666;
            font-size: 14px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .checkbox-container{
            margin-top:20px;
            display:flex;
            justify-content:center;
            
        }
        .checkbox-container input{
            width:20px;
            margin-right:50px;
        }
    </style>
</head>
<body>
 
    <div class="register-form">
        <?php
        $success = isset($_GET['success']);
        $message = isset($_GET['message']) ? $_GET['message'] : '';
        if ($success) {
        echo '<div class="success-message">'.$message."</div>";
        }
        ?>
        <h1>Регистрация</h1>
        
        <form method="POST" action="action.php">
            <div class="form-group">
                <label>Имя:</label>
                <input name="name" type="text" placeholder="Введите имя">
            </div>
            
            <div class="form-group">
                <label>Почта:</label>
                <input type="email" name="email" placeholder="name@example.ru">
            </div>
            
            <div class="form-group">
                <label>Пароль:</label>
                <input type="password" name="password" placeholder="Введите пароль">
            </div>
            
            <div class="form-group">
                <label>Подтвердите пароль:</label>
                <input type="password" name="confirm_password" placeholder="Повторите пароль">
            </div>

            <div class="form-group">
                <label>Выберите пол:</label>
                <select name="gender">
                    <option></option>
                    <option>Мужчина</option>
                    <option>Женщина</option>
                </select>
            </div>
            <button type="submit">Зарегистрироваться</button>
            <div class="checkbox-container">
                <input type="checkbox"> 
                <label>Создавая учетную запись, вы соглашаетесь с нашими <a href="url">Условиями договора</a></label>
            </div>

        </form>
        
    </div>
</body>
</html>
