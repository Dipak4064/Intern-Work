<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = "uploads/";  // Folder to store uploaded files
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true); // Create folder if not exists
    }

    $fileName = basename($_FILES["myfile"]["name"]);
    $targetFile = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    //Basic checks
    if ($_FILES["myfile"]["error"] !== 0) {
        echo "Error uploading file.";
        exit;
    }

    // Allow only certain file types
    $allowedTypes = ["jpg", "jpeg", "png", "gif", "pdf"];
    if (!in_array($fileType, $allowedTypes)) {
        echo "Only JPG, PNG, GIF & PDF files are allowed.";
        exit;
    }

    // Limit file size (5MB example)
    if ($_FILES["myfile"]["size"] > 5 * 1024 * 1024) {
        echo "File is too large. Max size 5MB.";
        exit;
    }

    //  Move file to upload folder
    if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetFile)) {
        echo "File uploaded successfully: " . htmlspecialchars($fileName);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
