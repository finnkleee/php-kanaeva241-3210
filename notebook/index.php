<?php
    require_once 'db.php';
    
    include_once 'menu.php';
    include_once 'viewer.php';
    include_once 'add.php';
    include_once 'edit.php';
    include_once 'delete.php';

    $page = $_GET['page'] ?? 'view';
    $sort = $_GET['sort'] ?? 'added';
    $p = $_GET['p'] ?? 1;

?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Записная книжка</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <header>
        <?= getMenu($page, $sort); ?>
    </header>
    <main>
        <?php
            switch ($page) {
                case 'add':
                    echo addContact($pdo, $sort = 'added', $page = 1);
                    break;
                case 'edit':
                    echo editContact($pdo, $sort = 'added', $page = 1);
                    break;
                case 'delete':
                    echo deleteContact($pdo, $sort = 'added', $page = 1);
                    break;
                case 'view':
                default:
                    echo viewContacts($pdo, $sort, $p);
                    break;
            }
        ?>
    </main>
    </body>
</html>