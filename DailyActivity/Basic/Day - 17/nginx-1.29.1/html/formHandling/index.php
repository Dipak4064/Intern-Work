<?php $err = $_GET["err"] ?? ""; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./formHandling/includes/formhandler.php" method="POST">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname">
        <span>* <?php echo $err; ?></span>
        <br>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname">
        <br>
        <label for="favouritepet">Favourite Pet:</label>
        <select name="favouritepet" id="favouritepet">
            <option value="dog">Dog</option>
            <option value="cat">Cat</option>
            <option value="hamster">Hamster</option>
        </select>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>