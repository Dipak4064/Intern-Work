<?php
$servername = "localhost";
$username = "root";
$password = "user";
$db = "product";

$conn = mysqli_connect($servername, $username, $password, $db);
if ($conn) {

} else {
    die("Connection was failed.");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
    <link rel="stylesheet" href="./template/navbar.css">
</head>

<body>
    <div class="container">
        <div class="nav">
            <div class="logo">
                <a href="index.php">
                    <img src="https://th.bing.com/th/id/OIP.F4F-VaSutHdY7LxYD9LOyQHaHa?w=160&h=187&c=7&r=0&o=5&dpr=1.2&pid=1.7"
                        alt="Logo">
                </a>
            </div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="manupulation/add.php">Add Post</a></li>
            </ul>
            <div class="register">
                <a href="#">Sign up</a>
                <a href="#">Login</a>
                <i class="fa-solid fa-circle-user"></i>
            </div>
        </div>
    </div>
    <div class="post">
        <?php
        $sql = "select src,title,descript from products";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card' onclick=\"window.location.href='./manupulation/edit.php'\">
                <form action='./edit.php' method='get'>
                <img src='{$row['src']}' alt='img'>
                <div class='des'>
                    <h3>{$row['title']}</h3>
                    <p>{$row['descript']}</p>
                </div>
                </form>
              </div>";
            }
        } else {
            echo "doesn't have any data.";
        }
        ?>
    </div>
    </div>
    <script src="app.js"></script>
</body>

</html>