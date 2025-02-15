<?php
    $equation = 'x + 3 = 7';
    $parts = explode(' ', $equation);
    $oper = $parts[1];
    $x = 'x';
    $compo = $parts[2];
    $result = $parts[4];
    $posx = strpos($equation, $x); 
    $posoper = strpos($equation, $oper);
    if ($posx < $posoper){
        echo "неизвестная переменная слева от оператора";
    } else {
        echo "неизвестная переменная справа от оператора";
    }
    switch ($oper) {
        case '+':
            echo "Оператор: Сложение";
            $solve = $result - $compo;
            echo $solve;
            break;
        case '-':
            echo "Оператор: Вычитание";
            break;
        case '/':
            echo "Оператор: Деление";
            break;
        case '*':
            echo "Оператор: Умножение";
            break;
        default:
            echo "Неизвестный оператор";
    }


?>