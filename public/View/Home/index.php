<!DOCTYPE html>
<html>

<head>
    <title>Home - Index</title>
</head>
<style>*{
    padding:2px;
    margin: 5px;
}
</style>
<body>
    <p>Home - Index</p>

    <p>
    <a href="/home/create">create</a>
</p>

    <table style="text-align:left;">
        <tr>
            <th style="font-weight:700">Post ID</th>
            <th style="font-weight:700">Author ID</th>
            <th style="font-weight:700">Author</th>
            <th style="font-weight:700">Title</th>
            <th style="font-weight:700">Text</th>
            <th style="font-weight:700">Update</th>
            <th style="font-weight:700">Delete</th>

        </tr>
        <?php foreach ($data as $key => $row) : ?>
            <tr>
                <td><?= isset($row['id']) ? $row['id'] : '' ?></td>
                <td><?= isset($row['author_id']) ? $row['author_id'] : '' ?></td>
                <td><?= isset($row['fullName']) ? $row['fullName'] : '' ?></td>
                <td><?= isset($row['title']) ? $row['title'] : '' ?></td>
                <td><?= isset($row['body']) ? $row['body'] : '' ?></td>
                <td><a href="/home/update?id=<?= $row['id'] ?>">update</a></td>
                <td><a href="/home/delete?id=<?= $row['id'] ?>">delete</a></td>
            </tr>
        <?php endforeach ?>
    </table>
    


</html>