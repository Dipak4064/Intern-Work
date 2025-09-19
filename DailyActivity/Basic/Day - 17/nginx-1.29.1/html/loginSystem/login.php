<?php
$login = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include "template/_dbconnect.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "select * from data where username = '$username' ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($password, $row['password'])) {
                    $login = true;
                    session_start();
                    $_SESSION['logedin'] = true;
                    $_SESSION['username'] = $username;
                    header("Location: ./welcome.php");
                } else {
                    $showError = "Invalid Password Credentials.";
                }
            }
        } else {
            $showError = "Invalid Username Credentials.";
        }
    } else {
        $showError = "SQL Error: " . mysqli_error($conn);
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Log In</title>
</head>

<body>
    <?php
    require './template/_navbar.php';
    ?>
    <?php
    if ($login) {
        echo '<div class="alert alert-success text-center shadow" role="alert" style="margin-top:20px;">
            Log in is successfull.
        </div>';
    }
    ?>
    <?php
    if ($showError) {
        echo '<div class="alert alert-danger text-center shadow" role="alert" style="margin-top:20px;">' . $showError . '</div>';
    }
    ?>
    <div class=" container shadow rounded bg-light" style="max-width:500px;  padding:20px; margin-top:20px;">
        <h1>Log In</h1>
        <form action="./login.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">User name</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">log in</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>