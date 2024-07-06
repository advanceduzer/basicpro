<!DOCTYPE html>
<html>

<head>
    <title>Home - Create</title>
</head>

<body>
    <p>Home - Create</p>
    


    <p>Add post</p>

    <form name="form" action="/home/create" method="post">
        <input type="input" name="author_id" id="author_id" value="<?= $_POST["author_id"]?? "" ?>" placeholder="author_id">
        <input type="input" name="title" id="title" value="<?= $_POST["title"]?? "" ?>" placeholder="title">
        <input type="input" name="body" id="body" value="<?= $_POST["body"]?? "" ?>" placeholder="body">
        <button type="submit" name="submit">Add post</button>
    </form>
</br>
<a href="/">Back</a>


</html>