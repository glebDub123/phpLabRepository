<?php
// Единая точка входа API — этот файл обрабатывает все запросы к API
require_once 'config.php';
// Устанавливаем заголовок Content-Type для ответа в формате JSON с кодировкой UTF-8
header('Content-Type: application/json; charset=utf-8');
// Разрешаем запросы с любого домена (CORS) — для продакшена лучше указать конкретный домен
header('Access-Control-Allow-Origin: *');
// Разрешённые HTTP-методы для CORS: GET, POST, PUT, DELETE, OPTIONS
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
// Разрешённые заголовки в запросах: Content-Type, Authorization, X-API-Key
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-API-Key');
// Если запрос типа OPTIONS (предзапрос CORS), завершаем скрипт без вывода данных
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') exit(0);
// Получаем метод текущего HTTP-запроса (GET, POST, PUT, DELETE и т.д.)
$method = $_SERVER['REQUEST_METHOD'];
// Получаем только конечную часть пути — имя действия (например, 'hello' из '/api/hello')
$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? null;

// Выбираем логику обработки в зависимости от значения $action
switch ($action) {
   case 'all':
        $result = pg_query($conn, "
            SELECT table_name 
            FROM information_schema.tables 
            WHERE table_schema = 'public' 
            AND table_type = 'BASE TABLE'
        ");
        
        $allData = [];
        
        while ($row = pg_fetch_assoc($result)) {
            $tableName = $row['table_name'];
            
            $dataResult = pg_query($conn, "SELECT * FROM \"$tableName\"");
            $data = pg_fetch_all($dataResult);
            
            $allData[$tableName] = $data ?: [];
        }
        
        echo json_encode($allData);
        break;
    case "get":
        $result = pg_query_params($conn, "SELECT * FROM cities WHERE id = $1", [$id]);
        $data = pg_fetch_assoc($result);
        
        if ($data) {
            echo json_encode($data);
        } else {
            http_response_code(404);
            echo json_encode(['error' => "Запись с id=$id не найдена"]);
        }
        break;
    case "del":
        $check = pg_query_params($conn, "SELECT id FROM cities WHERE id = $1", [$id]);
        
        if (pg_num_rows($check) === 0) {
            http_response_code(404);
            echo json_encode(['error' => "Запись с id=$id не найдена"]);
            break;
        }
        $result = pg_query_params($conn, "DELETE FROM cities WHERE id = $1", [$id]);
        if ($result) {
            echo json_encode(['message' => "Запись с id=$id успешно удалена"]);
        } 
        else {
            http_response_code(500);
            echo json_encode(['error' => 'Ошибка при удалении записи']);
        }
        break;
    default:
       // Устанавливаем HTTP-статус 404 (Not Found)
       http_response_code(404);
       // Возвращаем ошибку в формате JSON
       echo json_encode(['error' => 'Endpoint not found']);
}

