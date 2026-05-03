<?php
$lat = 59.9386;
$lon = 30.2141;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lat = floatval($_POST['lat']);
    $lon = floatval($_POST['lon']);
}

function getWeather($lat, $lon) {
    $url = "https://api.open-meteo.com/v1/forecast?latitude={$lat}&longitude={$lon}&current_weather=true&daily=temperature_2m_max,temperature_2m_min&timezone=Europe/Moscow";
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    return json_decode($response, true);
}

$data = getWeather($lat, $lon);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Погода</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e0e0e0;
            margin: 0;
            padding: 20px;
        }
        .box {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        form {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
        }
        input {
            flex: 1;
            padding: 8px;
        }
        button {
            padding: 8px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .temp {
            font-size: 50px;
            font-weight: bold;
            margin: 10px 0;
        }
        .days {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        .day {
            background: #f5f5f5;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
            flex: 1;
            min-width: 60px;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="box">
        <form method="POST">
            <input type="number" step="any" name="lat" placeholder="Широта" value="<?= $lat ?>" required>
            <input type="number" step="any" name="lon" placeholder="Долгота" value="<?= $lon ?>" required>
            <button type="submit">OK</button>
        </form>
        
        <?php if ($data && isset($data['current_weather'])): 
            $cur = $data['current_weather'];
            $daily = $data['daily'];
        ?>
            <div class="temp"><?= round($cur['temperature']) ?>°C</div>
            <div>Ветер: <?= round($cur['windspeed'] ?? 0) ?> км/ч</div>
            
            <div class="days">
                <?php for($i=0; $i<5; $i++): ?>
                <div class="day">
                    <div><?= date('d.m', strtotime($daily['time'][$i])) ?></div>
                    <div><?= round($daily['temperature_2m_max'][$i]) ?>°</div>
                    <div style="font-size:12px"><?= round($daily['temperature_2m_min'][$i]) ?>°</div>
                </div>
                <?php endfor; ?>
            </div>
        <?php else: ?>
            <div class="error">Ошибка</div>
        <?php endif; ?>
    </div>
</body>
</html>
