<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4.1.Регулярные выражения</title>
</head>
<body>
    <h3>Задание 3</h3>
    <?php
        session_start();
        if (isset($_SESSION['count'])) {
            $_SESSION['count'] = $_SESSION['count'] + 1;

            echo "Вы обновили страницу " . $_SESSION['count'] . " раз(а).";
        } else {
            $_SESSION['count'] = 0;
            echo "Вы ещё не обновляли эту страницу.";
        }
    ?>

    <h3>Задание 6</h3>
    <?php
    session_start(); 
    if (isset($_POST['email'])) {
        $_SESSION['email'] = $_POST['email'];
        header("Location: step2_form.php");
        exit();
    }
    ?>
    <form method="post">
        <label for="email">Введите ваш email:</label><br>
        <input type="email" name="email" required><br><br>
        <input type="submit" value="Сохранить и перейти">
    </form>

    <!-- 2 -->
    <?php
    session_start();
    $email_value = "";
    if (isset($_SESSION['email'])) {
        $email_value = $_SESSION['email'];
    }
    ?>

    <form method="post" action="#">
        <label>Имя:</label><br>
        <input type="text" name="first_name"><br><br>

        <label>Фамилия:</label><br>
        <input type="text" name="last_name"><br><br>

        <label>Пароль:</label><br>
        <input type="password" name="password"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo htmlspecialchars($email_value); ?>"><br><br>

        <input type="submit" value="Отправить">
    </form>      

    <h3>Задание 7</h3>
    <?php
       if (!isset($_COOKIE['test'])) {
            setcookie('test', '123', time() + 3600); 
            echo "Кука 'test' установлена. Обновите страницу, чтобы увидеть её значение.";
        } else {
            echo "Значение куки 'test': " . $_COOKIE['test'];
        } 
    ?>

    <h3>Задание 8</h3>
    <?php
        if (isset($_COOKIE['test'])) {
            setcookie('test', '', time() - 3600);
            echo "Кука 'test' удалена.";
        } else {
            echo "Кука 'test' не найдена.";
        }
    ?>

    <h3>Задание 9</h3>
    <?php
        if (isset($_COOKIE['visit_count'])) {
            $visit_count = $_COOKIE['visit_count'] + 1;
        } else {
            $visit_count = 1;
        }
        setcookie('visit_count', $visit_count, time() + 365 * 24 * 60 * 60);
        echo "Вы посетили наш сайт " . $visit_count . " раз(а)!";
    ?>
</body>
</html>