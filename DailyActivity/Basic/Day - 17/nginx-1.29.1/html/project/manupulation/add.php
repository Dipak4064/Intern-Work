<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../template/navbar.css">
    <link rel="stylesheet" href="add.css">
</head>

<body>
    <?php include '../template/navbar.php'; ?>
    <div class="edit">
        <form action="../addDB.php" method="GET">
            <label for="image">Image file</label>
            <input type="text" name="image" id="image" required>
            <br>
            <label for="heading">Title Heading</label>
            <input type="text" name="heading" required>
            <br>
            <label for="desc">Description</label>
            <br>
            <textarea name="desc" id="desc" cols="20" rows="10" required>The </textarea>
            <br>
            <div class="btn">
                <button><a href="../index.php">Back</a></button>
                <button type="submit">Post</button>
            </div>
        </form>
    </div>
</body>

</html>