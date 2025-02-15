<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css.php">
</head>
<body>
    <header class="header">
        <div class="header__wrapper">
            <img src="images/logo.png" alt="" class="logo">
            <?php
                echo "<div class = 'zadanie'><h1>4.1. Домашняя работа: Feedback Form</h1></div>";
            ?>
        </div>
        
    </header>
    <main class="main">
        <div class="main__wrapper">
            <form action=" https://httpbin.org/post" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
                <input type="submit" value="Submit">
            </form>
            <?php
                echo '<a href="index__main2.php">submit</a>';
            ?>
        </div>
    </main>
    <footer class="footer">
        <?php
            echo "<div class = 'foot__text'><h3>Собрать сайт из двух страниц</h3></div>";
        ?>
    </footer> 
</body>
</html>