<!DOCTYPE html>
<html>

<head>
    <title>Update</title>
</head>
<body>
    <p>Update</p>

    <p><a href="/home/">back</a></p>
    <form name="form" action="/home/update?id=<?= $_GET['id'] ?>" method="post">
        <br>post_id: <?= $data[0]['id'] ?? '' ?>
        <br>
        <label for="title">Title:</label>
        <input type="input" name="title" id="title" value="<?= $_POST['title'] ?? '' ?>" placeholder="<?= $data[0]['title'] ?? '' ?>">
        <br>
        <label for="body">Body:</label>
        <input type="input" name="body" id="body" value="<?= $_POST['body'] ?? '' ?>" placeholder="<?= $data[0]['body'] ?? '' ?>">
        <br>
        <button type="submit" name="submit">Update post</button>
    </form>
</body>

</html>