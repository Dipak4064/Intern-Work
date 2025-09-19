<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $servername = "localhost";
    $username = "root";
    $password = "user";
    $conn = mysqli_connect($servername, $username, $password);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
    }
    ?>
    <div class="navbar">
        <div class="logo">
            <h2>My Logo</h2>
        </div>
        <ul>
            <li>Home</li>
            <li>About</li>
            <li>Contact</li>
            <li>Blog</li>
        </ul>
        <div class="account">
            <button>Login</button>
            <button>Register</button>
            <div class="img" style="color:black;align-items: center;display: flex;justify-content: center;">act</div>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <img src="https://th.bing.com/th/id/OIP.jJI3bTJ-diLfKDHb9-vwmwHaE8?w=281&h=187&c=7&r=0&o=7&dpr=1.2&pid=1.7&rm=3"
                alt="food img">
            <div class="des">
                <h3>Card Title</h3>
                <p>Card content goes here. Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti saepe modi
                    temporibus nobis voluptates, aspernatur consequuntur impedit</p>
            </div>
            <div class="btn">
                <button>ReadMore</button>
                <button>Delete</button>
                <button>Edit</button>
            </div>
        </div>
    </div>
</body>

</html>