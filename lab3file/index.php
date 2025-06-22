<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ссылки и файлы.</title>
    <style>
        body {
            margin-left: 5rem; 
        }
        input { 
            width: 20.8rem; 
            height: 1.5rem; 
            font-size: 1.25rem; 
            margin-bottom: 0.625rem; 
        }
        button { 
            width: 20.8rem; 
            height: 1.5rem; 
            font-size: 1.125rem; 
            margin: 0.125rem; 
        }
    </style>
</head>
<body>
    <h3> Задание 1</h3>
    <form method="post" action="main.php">
        <label>Введите текст:</label><br><br>
        <input type="text" name="text" placeholder="что угодно" required>
        <br>
        <button type="submit">Преобразовать</button>
    </form>
    <h3> Задание 4</h3>
    <?php
        $files = ['1.txt', '2.txt', '3.txt'];

        foreach ($files as $filrename) {
            $new = fopen($filrename, 'a');
            if ($new) {
                fwrite($new, '!');
                fclose($new);
                echo "Добавлен '!' в файл: $filrename <br>";
            } else {
                echo "Не удалось открыть файл: $filrename <br>";
            }
        }
    ?>
    <h3> Задание 9</h3>
    <?php
        $source = 'test9.txt';
        $place = 'dir/copy.txt';
        if (copy($source, $place)) {
            echo "Файл успешно скопирован в $place";
        } else {
            echo "Ошибка при копировании файла";
        }
    ?>
    <h3> Задание 13</h3>
    <?php
        $source1 = 'test.txt';
        $place1 = 'dir/test.txt';
        if (rename($source1, $place1)) {
            echo "Файл успешно перемещён в $place1";
        } else {
            echo "Ошибка при перемещении файла";
        }
    ?>
    <h3> Задание 24</h3>
    <?php
        $file_name = 'text.txt';

        $text = '12345';

        if (file_put_contents($file_name, $text)) {
            echo "Файл '$file_name' создан и в него записано: $text";
        } else {
            echo "Не удалось создать файл.";
        }
    ?>
</body>
</html>