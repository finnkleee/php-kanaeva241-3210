<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>результат работы</title>
</head>
<body>
    <?php
    $headers = get_headers('http://your-website.com/process.php');
    foreach($headers as $header) {
        echo $header;
    }
    ?>
</body>
</html>