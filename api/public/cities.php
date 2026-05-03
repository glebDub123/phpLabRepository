<?php
require_once 'config.php';

$country = $_GET['country'];

if (empty($country)) {
    die('Ошибка: укажите параметр country');
}

$result = pg_query_params($conn, "SELECT city FROM cities WHERE country = $1 ORDER BY city",[$country]);

$cities = [];
while ($row = pg_fetch_assoc($result)) {
    $cities[] = $row['city'];
}

echo implode(", ", $cities);

pg_close($conn);
?>
