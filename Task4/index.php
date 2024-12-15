<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir);
    }
    $file_path = $upload_dir . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $file_path)) {
        echo "<p>Файл успішно завантажено: $file_path</p>";
    } else {
        echo "<p>Помилка завантаження файлу.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Завантаження зображень</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <label>Завантажити зображення: <input type="file" name="image"></label><br>
        <button type="submit">Завантажити</button>
    </form>
</body>

</html>