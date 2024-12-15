<?php

if (isset($_GET['font_size'])) {
    setcookie('font_size', $_GET['font_size'], time() + 3600, '/');
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
$font_size = $_COOKIE['font_size'] ?? '16px';
?>
<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Робота з cookie</title>
    <style>
        body {
            font-size: <?= htmlspecialchars($font_size) ?>;
        }
    </style>
</head>

<body>
    <a href="?font_size=24px">Великий шрифт</a>
    <a href="?font_size=16px">Середній шрифт</a>
    <a href="?font_size=12px">Маленький шрифт</a>
</body>

</html>