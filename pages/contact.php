<?php
include '../includes/header.php';
?>
<main>
    <h1>Контакты</h1>

    <form method="post">
        <input type="text" name="name" placeholder="Имя">
        <input type="email" name="email" placeholder="Email">
        <textarea name="message"></textarea>
        <button type="submit">Отправить</button>
    </form>
</main>

<?php
    if (isset($_POST['name']) || isset($_POST['email']) || isset($_POST['message'])) {
        echo '<p>'.$_POST['name'].'</p>';
        echo '<p>'.$_POST['email'].'</p>';
        echo '<p>'.$_POST['message'].'</p>';
        echo '<p>Сообщение отправлено</p>';
    }
?>
<?php include '../includes/footer.php'; ?>

