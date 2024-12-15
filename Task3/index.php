<?php
$comments_file = 'comments.txt';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['name']) && !empty($_POST['comment'])) {
    $name = htmlspecialchars($_POST['name']);
    $comment = htmlspecialchars($_POST['comment']);
    file_put_contents($comments_file, "$name|$comment\n", FILE_APPEND);
}
$comments = file_exists($comments_file) ? file($comments_file) : [];
?>
<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Коментарі</title>
</head>

<body>
    <form method="post">
        <label>Ім’я: <input type="text" name="name"></label><br>
        <label>Коментар: <textarea name="comment"></textarea></label><br>
        <button type="submit">Надіслати</button>
    </form>
    <table border="1">
        <tr>
            <th>Ім’я</th>
            <th>Коментар</th>
        </tr>
        <?php foreach ($comments as $line): list($name, $comment) = explode('|', trim($line)); ?>
            <tr>
                <td><?= htmlspecialchars($name) ?></td>
                <td><?= htmlspecialchars($comment) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>