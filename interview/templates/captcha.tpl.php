<?php
    $num1 = rand(1, 9);
    $num2 = rand(1, 9);
    $op = array('+', '-', '*', '/');
    $operator = $op[rand(0,3)];
    switch($operator) {
        case '+': $res = $num1 + $num2; break;
        case '-': $res = $num1 - $num2; break;
        case '*': $res = $num1 * $num2; break;
        case '/': $res = $num1 / $num2; break;
    }
    

    $_SESSION['captcha'] = $res;


?>