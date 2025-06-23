<?php
    require_once 'trig.php';


   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['action']) && $_POST['action'] === 'trig_btn') {
            $filePath = __DIR__ . '/Task/expression.txt';
            if (file_exists($filePath)) {
                $expression = file_get_contents($filePath);
                echo json_encode(['expression' => $expression]);
            } else {
                echo json_encode(['expression' => 'Ошибка: файл не найден']);
            }
            exit;
        }else {
            $expression = $_POST['expression'] ?? $_GET['expression'] ?? null;
        }

        
        
        if (!isValidBrackets($expression)) {
            echo "Ошибка в скобках";
            exit;
        }
    
        echo calculateRecursive($expression);
    }

    function trigFunction($func, $value) {
        $func = strtolower($func);
        $value = floatval($value);

        $radians = deg2rad($value);
        
        switch ($func) {
            case 'sin':
                return sin($radians);
            case 'cos':
                return cos($radians);
            case 'tan':
                return tan($radians);
            default:
                return "Ошибка: неизвестная функция $func";
        }
    }

    function isValidBrackets($str) {
        $stack = 0;
        for ($i = 0; $i < strlen($str); $i++) {
            if ($str[$i] === '(') $stack++;
            if ($str[$i] === ')') $stack--;
            if ($stack < 0) return false;
        }
        return $stack === 0;
    }

    function replaceTrigFunctions($expr) {
        return preg_replace_callback('/(sin|cos|tan)\s*$\s*([0-9.]+)\s*$/i', function($matches) {
            $func = $matches[1];
            $param = $matches[2];
            return trigFunction($func, $param);
        }, $expr);
    }

    function calculateRecursive($expr) {
        $expr = str_replace(' ', '', $expr);

        $expr = replaceTrigFunctions($expr);

        if (strpos($expr, '(') === false) {
            return evalSimple($expr);
        }

        

        $start = strrpos($expr, '(');
        $end = strpos($expr, ')', $start);
        $inner = substr($expr, $start + 1, $end - $start - 1);
        $result = calculateRecursive($inner);
        $newExpr = substr($expr, 0, $start) . $result . substr($expr, $end + 1);
        return calculateRecursive($newExpr);
    }

    function evalSimple($expr) {
        if (!preg_match('/^[0-9+\-*\/.]+$/', $expr)) return 'Недопустимое выражение';
        return eval("return $expr;");
    }
?>