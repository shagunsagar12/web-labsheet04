<?php

if (isset($_POST['upload'])) {

    $folder = "uploads/";

    if (!is_dir($folder)) {
        mkdir($folder, 0755, true);
    }

    $file = $_FILES['image'];

    $allowed = ['jpg', 'jpeg', 'png'];
    $extension = strtolower(
        pathinfo($file['name'], PATHINFO_EXTENSION)
    );

    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Upload failed!");
    }

    if ($file['size'] > 2 * 1024 * 1024) {
        die("File size must be below 2MB!");
    }

    if (!in_array($extension, $allowed)) {
        die("Only JPG, JPEG and PNG files allowed!");
    }

    $imageInfo = getimagesize($file['tmp_name']);

    if ($imageInfo === false) {
        die("Invalid image file!");
    }

    $newName = bin2hex(random_bytes(16)) . "." . $extension;

    if (move_uploaded_file(
        $file['tmp_name'],
        $folder . $newName
    )) {
        echo "Image Uploaded Successfully!";
    }
}
?>

<h2>Upload Image</h2>

<form method="POST" enctype="multipart/form-data">

    Select Image:
    <input type="file" name="image" accept=".jpg,.jpeg,.png" required>

    <br><br>

    <button type="submit" name="upload">Upload</button>

</form>