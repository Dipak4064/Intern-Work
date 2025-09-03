<?php
$showAlert = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include "template/_dbconnect.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $existSql = "SELECT * FROM data where username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $noRow = mysqli_num_rows($result);
    if ($noRow > 0) {
        $showError = "User name already exist";
    } else {
        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO data (username, password, created_at) VALUES ('$username', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
            }
        } else {
            $showError = "password do not match";
        }
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
    <title>Sign Up</title>
</head>

<body>
    <?php
    require './template/_navbar.php';
    ?>
    <?php
    if ($showAlert) {
        echo '<div class="alert alert-success text-center shadow" role="alert" style="margin-top:20px;">
        successfully sign up.
    </div>';
    }
    ?>
    <?php
    if ($showError) {
        echo '<div class="alert alert-danger text-center shadow" role="alert" style="margin-top:20px;">' . $showError . '</div>';
    }
    ?>

    <div class=" container shadow rounded bg-light" style="max-width:500px;  padding:20px; margin-top:20px;">
        <h1>Sign Up</h1>
        <form action="./signup.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp"
                    maxlength="12">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" maxlength="16">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
            </div>
            <button type="submit" class="btn btn-primary">sign up</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>