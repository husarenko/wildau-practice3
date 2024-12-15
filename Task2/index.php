<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($login === 'Admin' && $password === 'password') {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $login;
    } else {
        echo "<p>Невірний логін або пароль</p>";
    }
}
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Авторизація</title>
</head>

<body>
    <?php if (!empty($_SESSION['logged_in'])): ?>
        <p>Добрий день, <?= htmlspecialchars($_SESSION['username']) ?>!</p>
        <a href="?logout=true">Вийти</a>
    <?php else: ?>
        <form method="post">
            <label>Логін: <input type="text" name="login"></label><br>
            <label>Пароль: <input type="password" name="password"></label><br>
            <button type="submit">Увійти</button>
        </form>
    <?php endif; ?>
</body>

</html>