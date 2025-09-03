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
        <form action="/addDB.php">
            <label for="image">Image file</label>
            <input type="text" name="image" id="image">
            <br>
            <label for="heading">Title Heading</label>
            <input type="text" name="heading">
            <br>
            <label for="desc">Description</label><br>
            <textarea name="desc" id="desc" cols="20" rows="10"></textarea>
            <br>
            <div class="btn">
                <button><a href="../index.php">Back</a></button>
                <button><a href="../delete.php">Delete</a></button>                
                <button><a href="#">Update</a></button>
            </div>
        </form>
    </div>
</body>

</html>