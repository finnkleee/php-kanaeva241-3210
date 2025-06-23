<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4.1.Регулярные выражения</title>
</head>
<body>
    <h3>Задание 9</h3>
    <?php
        $string = 'aae xxz 33a';
        $pattern = '/(.{1})\1/';

        $result = preg_replace($pattern, '!', $string);

        echo "Исходная строка: " . $string . "\n";
        echo "Измененная строка: " . $result . "\n";
    ?>

    <h3>Задание 16</h3>
    <?php
        $string = 'xbx aca aea abba adca abea';
        $pattern = '/\b/';

        $result = preg_replace($pattern, '!', $string);

        echo "Исходная строка: " . $string . "\n";
        echo "Измененная строка: " . $result . "\n";
    ?>

    <h3>Задание 25</h3>
    <?php
        $string = 'aaa * bbb ** eee * **';
        $pattern = '/(?<!\*)\*(?!\*)/';


        $result = preg_replace($pattern, '!', $string);

        echo "Исходная строка: " . $string . "\n";
        echo "Измененная строка: " . $result . "\n";
    ?>

    <h3>Задание 40</h3>
    <?php
        $string = 'aa aba abba abbba abbbba abbbbba';
        $pattern = '/ab{2,4}a/';

        $matches = [];

        preg_match_all($pattern, $string, $matches);

        echo "Исходная строка: " . $string . "\n";
        echo "Найденные совпадения:\n";
        foreach ($matches[0] as $match) {
            echo $match . "\n";
        }
    ?>

    <h3>Задание 68</h3>
    <?php
        $string = 'ave a#a a2a a$a a4a a5a a-a aca';
        $pattern = '/\s/';

        $result = preg_replace($pattern, '!', $string);

        echo "Исходная строка: " . $string . "\n";
        echo "Измененная строка: " . $result . "\n";
    ?>
</body>
</html>