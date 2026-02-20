<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name              = $_POST['name'];
    $errors            = [];
    if (empty($name)) {
        $errors[] = 'Name is required';
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image'];
        $imageName = uniqid() . '_' . $image['name'];
        $imageTmpName = $image['tmp_name'];
        $imageSize = $image['size'];
        $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        // Allowed extensions
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageExt, $allowedExtensions)) {
            $errors[] = 'Only JPG, JPEG, PNG, and GIF files are allowed.';
        }

        // File size validation (2MB = 2 * 1024 * 1024 bytes)
        if ($imageSize > 2 * 1024 * 1024) {
            $errors[] = 'File size must not exceed 2MB.';
        }

        // If no errors, move uploaded file
        if (empty($errors)) {
            $uploadDir = '../uploads/imageGallery/';
            $uploadFilePath = $uploadDir . basename($imageName);

            if (!move_uploaded_file($imageTmpName, $uploadFilePath)) {
                $errors[] = 'Failed to upload image.';
            }
        }
    } else {
        $errors[] = 'Image is required.';
    }

    if (!empty($errors)) {
        echo json_encode(['errors' => $errors]);
    } else {

        // Database connection (adjust the credentials accordingly)
        $mysqli = new mysqli('localhost', 'u448113253_expontinst', 'b@^8XSJ1X', 'u448113253_expontinst');

        if ($mysqli->connect_error) {
            die('Database connection failed: ' . $mysqli->connect_error);
        }

        // Insert into database
        $stmt = $mysqli->prepare("INSERT INTO image_gallery (name,  image) VALUES (?, ?)");
        $stmt->bind_param('ss', $name,  $imageName);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Image Successfully Stored']);
        } else {
            echo json_encode(['message' => 'Failed to store image']);
        }

        $stmt->close();
        $mysqli->close();
    }
}
