<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['login']) && !empty($_POST['password'])) {
    $login = $_POST['login'];
    $folder_path = "users/$login";

    if (!is_dir($folder_path)) {
        mkdir($folder_path, 0777, true);
        mkdir("$folder_path/video");
        mkdir("$folder_path/music");
        mkdir("$folder_path/photo");
        file_put_contents("$folder_path/video/sample.txt", "Sample video content");
        file_put_contents("$folder_path/music/sample.txt", "Sample music content");
        file_put_contents("$folder_path/photo/sample.txt", "Sample photo content");
        echo "<p>Користувацька папка створена.</p>";
    } else {
        echo "<p>Папка з таким логіном вже існує.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Робота з каталогами</title>
</head>

<body>
    <form method="post">
        <label>Логін: <input type="text" name="login"></label><br>
        <label>Пароль: <input type="password" name="password"></label><br>
        <button type="submit">Створити папку</button>
    </form>
</body>

</html>