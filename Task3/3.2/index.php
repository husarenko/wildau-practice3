<?php
$file1 = 'file1.txt';
$file2 = 'file2.txt';
$unique_file = 'unique.txt';
$common_file = 'common.txt';
$frequent_file = 'frequent.txt';

if (file_exists($file1) && file_exists($file2)) {
    $words1 = array_count_values(str_word_count(file_get_contents($file1), 1));
    $words2 = array_count_values(str_word_count(file_get_contents($file2), 1));

    $unique = array_diff_key($words1, $words2);
    $common = array_intersect_key($words1, $words2);
    $frequent = array_filter($words1 + $words2, fn($count) => $count > 2);

    file_put_contents($unique_file, implode(" ", array_keys($unique)));
    file_put_contents($common_file, implode(" ", array_keys($common)));
    file_put_contents($frequent_file, implode(" ", array_keys($frequent)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['delete_file'])) {
    $file_to_delete = $_POST['delete_file'];
    if (file_exists($file_to_delete)) {
        unlink($file_to_delete);
        echo "<p>Файл $file_to_delete успішно видалено.</p>";
    } else {
        echo "<p>Файл $file_to_delete не знайдено.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Робота з файлами</title>
</head>

<body>
    <form method="post">
        <label>Введіть назву файлу для видалення: <input type="text" name="delete_file"></label><br>
        <button type="submit">Видалити</button>
    </form>
</body>

</html>