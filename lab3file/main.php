<?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $text = $_POST['text'];

            $words = explode(' ', $text);

            transformWords($words);

            $result = implode(' ', $words);

            echo "<strong>Результат:</strong> $result";
        }

        function transformWords(&$arr) {
            for ($i = 0; $i < count($arr); $i++) {
                if (($i + 1) % 2 == 0) {
                    $arr[$i] = mb_strtoupper($arr[$i]);
                }
            }
        }
    ?>