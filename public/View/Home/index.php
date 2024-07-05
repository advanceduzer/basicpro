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


    <p>Add post</p>

    <form name="form" action="/home/insert" method="post">
        <input type="input" name="author_id" id="author_id" value="" placeholder="author_id">
        <input type="input" name="title" id="title" value="" placeholder="title">
        <input type="input" name="body" id="body" value="" placeholder="body">
        <button type="submit" name="submit">Add post</button>
    </form>




</html>