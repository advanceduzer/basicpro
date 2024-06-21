<!DOCTYPE html>
<html>

<head>
    <title>Home - Index</title>
</head>

<body>
    <p>Home - Index</p>
    <table style="text-align:left;">
        <tr>
            <th style="font-weight:700">Post ID</th>
            <th style="font-weight:700">Author ID</th>
            <th style="font-weight:700">Title</th>
            <th style="font-weight:700">Text</th>
        </tr>
        <?php foreach ($data as $key => $row) : ?>

            <tr>
                <td><?= isset($row['id']) ? $row['id'] : '' ?></td>
                <td><?= isset($row['author_id']) ? $row['author_id'] : '' ?></td>
                <td><?= isset($row['title']) ? $row['title'] : '' ?></td>
                <td><?= isset($row['body']) ? $row['body'] : '' ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    
   
</html>

