<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title              = $_POST['title'];
    $meta_title         = $_POST['meta_title'];
    $description        = $_POST['description'];
    $meta_description   = $_POST['meta_description'];
    $meta_keywords      = $_POST['meta_keywords'];
    $content            = $_POST['content'];
    $link               = $_POST['link'];
    $publishType        = 'unpublished';

    $errors             = [];
    if (empty($title)) {
        $errors[] = 'Title is required';
    }
    if (empty($meta_title)) {
        $errors[] = 'Meta title is required';
    }
    if (empty($description)) {
        $errors[] = 'Description is required';
    }
    if (empty($meta_description)) {
        $errors[] = 'Meta description is required';
    }
    if (empty($meta_keywords)) {
        $errors[] = 'Meta keywords are required';
    }
    if (empty($content)) {
        $errors[] = 'Content is required';
    }
    if (empty($link)) {
        $errors[] = 'Link is required';
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
            $uploadDir = '../uploads/blogImages/';
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
        $stmt = $mysqli->prepare("INSERT INTO blogs (title, meta_title, description, meta_description, meta_keywords, content, link, publish_type, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssssssss', $title, $meta_title, $description, $meta_description, $meta_keywords, $content, $link, $publishType,  $imageName);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Blog successfully created']);
        } else {
            echo json_encode(['message' => 'Failed to create blog']);
        }

        $stmt->close();
        $mysqli->close();
    }
}
