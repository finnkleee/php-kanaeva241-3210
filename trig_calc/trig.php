<?php
    function getTrigExpression() {
        $filePath = __DIR__ . '/Task/expression.txt'; // путь к файлу с выражением
        if (file_exists($filePath)) {
            return file_get_contents($filePath);
        } else {
            return 'Ошибка: файл не найден';
        }
    }
    
?>
