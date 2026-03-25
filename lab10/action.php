<?php
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm = $_POST['confirm_password'];
$gender = $_POST['gender'];

if(empty($name) || empty($email) || empty($password) || empty($confirm) || empty($gender) ){

    $params = array(
        'success' => '0',
        'message' => 'Не введены поля!'
    );
    header('Location: index.php?' . http_build_query($params));
}
else if ($password != $confirm){
    $params = array(
        'success' => '0',
        'message' => 'Не совпадают пароли!'
    );
    header('Location: index.php?' . http_build_query($params));
}
else{
    $params = array(
        'success' => '1',
        'message' => 'Регистрация прошла успешно!'
    );
    header('Location: index.php?' . http_build_query($params));
}


?>
