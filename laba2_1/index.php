<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laba 2.1</title>
    <link rel="stylesheet" href="style.css.php">
</head>
<body>
    <header class="header">
        <div class="header__wrapper">
            <img src="../images/logo.png" alt="" class="logo">
            <?php
                echo "<div class = 'zadanie'><h1>2.1.Домашняя работа: Hello, World!</h1></div>";
            ?>
        </div>
        
    </header>
    <main class="main">
        <div class="main__wrapper">
            <?php
            echo "<h2>Hello, world!</h2>";
            ?>
        </div>
    </main>
    <footer class="footer">
        <?php
            echo "<div class = 'foot__text'><h3>Задание для самостоятельной работы «Hello, World!»</h3></div>";
        ?>
    </footer> 
</body>
</html>