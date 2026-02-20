<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id                 = $_POST['id'];
    $name               = $_POST['name'];
    $errors             = [];

    if (empty($id) || !is_numeric($id)) {
        $errors[] = 'Valid ID is required';
    }
    if (empty($name)) {
        $errors[] = 'Name is required';
    }
        

    $mysqli = new mysqli('localhost', 'u448113253_expontinst', 'b@^8XSJ1X', 'u448113253_expontinst');
    $imageGalllery_id = $_POST['id'];
    // Fetch the blog details using the blog ID
    $sql = "SELECT * FROM image_gallery WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $imageGalllery_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $imageGallery = $result->fetch_assoc();
    $oldImagePath       = '../uploads/imageGallery/'. $imageGallery['image']; 
    $imageName = $imageGallery['image']; 

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
        
    
        // If no errors, proceed to update the image
        if (empty($errors) ) {
            // Check if old image exists and delete it
            if (file_exists($oldImagePath) && $imageGallery['image']!=null) {
                unlink($oldImagePath); // Delete the old image
            }
    
            $uploadDir = '../uploads/imageGallery/';
            $uploadFilePath = $uploadDir . basename($imageName);
    
            // Move uploaded file
            if (!move_uploaded_file($imageTmpName, $uploadFilePath)) {
                $errors[] = 'Failed to upload image.';
            }
        }
    } 


    
    // Database connection
    if (!empty($errors)) {
        echo json_encode(['errors' => $errors]);
    } else {
        // $mysqli = new mysqli('localhost', 'root', '', 'sociadfx_exponentdb');

        if ($mysqli->connect_error) {
            die('Database connection failed: ' . $mysqli->connect_error);
        }

        // Update the blog post
        $stmt = $mysqli->prepare("UPDATE image_gallery SET name=?, image=? WHERE id=?");
        $stmt->bind_param('ssi', $name, $imageName,$id);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Image successfully updated']);
        } else {
            echo json_encode(['message' => 'Failed to update Image']);
        }

        $stmt->close();
        $mysqli->close();
    }
}