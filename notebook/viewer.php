<?php


    function viewContacts($pdo, $sort = 'default', $page = 1) {
        $orderBy = match ($sort) {
            'surname' => 'surname',
            'birth' => 'birth_date',
            default => 'id'
        };

        $limit = 10;
        $offset = ((int)$page - 1) * $limit;

        $stmt = $pdo->prepare("SELECT * FROM contacts ORDER BY $orderBy LIMIT $limit OFFSET $offset");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $html = "<table border='1'><tr>
            <th>Фамилия</th><th>Имя</th><th>Отчество</th>
            <th>Пол</th><th>Дата рождения</th><th>Телефон</th>
            <th>Адрес</th><th>Email</th><th>Комментарий</th>
            </tr>";

        foreach ($rows as $row) {
            $html .= "<tr>
                <td>{$row['surname']}</td><td>{$row['name']}</td><td>{$row['lastname']}</td>
                <td>{$row['gender']}</td><td>{$row['birth_date']}</td><td>{$row['phone']}</td>
                <td>{$row['address']}</td><td>{$row['email']}</td><td>{$row['comment']}</td>
            </tr>";
        }
        $html .= "</table>";

        $count = $pdo->query("SELECT COUNT(*) FROM contacts")->fetchColumn();
        $pages = ceil($count / $limit);
        if ($pages > 1) {
            $html .= "<div class='submenu'>";
            for ($i = 1; $i <= $pages; $i++) {
                $border = ($i == $page) ? 'style="border:2px solid black;"' : '';
                $html .= "<a href='?page=view&sort=$sort&p=$i' $border>$i</a>";
            }
            $html .= "</div>";
        }

        return $html;
    }
?>