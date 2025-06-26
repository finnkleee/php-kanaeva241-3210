<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $expression = $_POST['expression'] ?? $_GET['expression'] ?? null;

    if (!isValidBrackets($expression)) {
        echo "Ошибка в скобках";
        exit;
    }

    echo calculateRecursive($expression);
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

function calculateRecursive($expr) {
    $expr = str_replace(' ', '', $expr);
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
    if (!preg_match('/^[0-9+\-*\/.]+$/', $expr)){
        return 'Недопустимое выражение';
    } else{
        $parts = str_split($expr);
        $oper = $parts[1];
        $p1 = $parts[0];
        $p2 = $parts[2];
        switch ($oper) {
        case '+':
            $solve = $p1 + $p2;
            return $solve;
            break;
        case '-':
            $solve = $p1 - $p2;
            return $solve;
            break;
        case '/':
            $solve = $p1 / $p2;
            return $solve;
            break;
        case '*':
            $solve = $p1 * $p2;
            return $solve;
            break;
        }
    }
}
?>