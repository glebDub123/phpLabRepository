<?php
$result = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $url = "https://api.adviceslip.com/advice";
        $response = file_get_contents($url);
        
        if ($response !== false) {
            $result = json_decode($response, true);
        } else {
            $error = 'Ошибка подключения к серверу погоды';
        }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Погода</title>
    <style>
        body 
            { 
                font-family: sans-serif; 
                max-width: 500px; 
                margin: 50px auto; 
                padding: 20px; }
        input, button 
            { 
                padding: 10px; 
                margin: 5px; 
                font-size: 16px; }
        .result 
            { 
                margin-top: 20px; 
                padding: 15px; 
                border-radius: 8px; }
    </style>
</head>
<body>
    <h2>Советы</h2>
    <form method="POST">
        <button type="submit">Получить совет</button>
    </form>

    <?php if ($error): ?>
        <div class="result error"><?= $error ?></div>
    <?php endif; ?>

    <?php if ($result): ?>
        <div class="result">
            <h3>Ваш совет:</h3>
            <p><?= $result['slip']['advice']?></p>
        </div>
    <?php endif; ?>
</body>
</html>
