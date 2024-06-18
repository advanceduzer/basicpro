<!DOCTYPE html>
<html>

<head>
    <title>Home - Index</title>
</head>

<body>
    <p>Home - Index</p>
    <table>
        <?php foreach ($data as $key => $row) : ?>
            <tr>
                <td><?= $row['id'] ?><td>
                <td><?= $row['author_id'] ?><td>
                <td><?= $row['author'] ?><td>
                <td><?= $row['title'] ?><td>
                <td><?= $row['body'] ?><td>
            </tr>
        <?php endforeach ?>
    </table>
    
   
</html>

