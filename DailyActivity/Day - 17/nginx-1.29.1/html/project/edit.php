<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .edit {
        display: flex;
        flex-direction: column;
    }

    .edit input {
        max-width: 400px;
        height: 40px;
        outline: none;
        border-radius: 10px;
        margin-top:5px;
        font-size:30px;
    }

    .btn {
        display: flex;
        width: 100px;
    }

    .btn button {
        margin-right: 50px;
        font-size: 20px;
        padding: 5px;
        border-radius: 5px;
        border: none;
    }

    a {
        text-decoration: none;
    }
</style>

<body>
    <div class="edit">
        <label for="image">Image file</label>
        <input type="text" name="image" id="image">
        <br>
        <label for="heading">Title Heading</label>
        <input type="text" name="heading">
        <br>
        <label for="desc">Description</label>
        <input type="text" name="desc" id="desc">
        <br>
        <div class="btn">
            <button><a href="index.php">Back</a></button>
            <button>Update</button>
        </div>
    </div>
</body>

</html>