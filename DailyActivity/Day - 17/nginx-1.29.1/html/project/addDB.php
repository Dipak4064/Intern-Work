<?php
$servername = "localhost";
$username = "root";
$password = "user";
$db = "product";
try {
    $conn = mysqli_connect($servername, $username, $password, $db);
    if (!$conn) {
        echo "failed";
    } else {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $src = $_GET['image'] ?? '';
            $title = $_GET['heading'] ?? '';
            $descript = $_GET['desc'] ?? '';
            $sql = "insert into products (src,title,descript) values ('$src','$title','$descript')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: index.php");
                exit();
            } else {
                echo "Erro" . mysqli_error($conn);
            }
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>