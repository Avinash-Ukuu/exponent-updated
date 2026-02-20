<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id                 = $_POST['id'];
    $title              = $_POST['title'];
    $meta_title         = $_POST['meta_title'];
    $description        = $_POST['description'];
    $meta_description   = $_POST['meta_description'];
    $meta_keywords      = $_POST['meta_keywords'];
    $content            = $_POST['content'];
    $link               = $_POST['link'];
    $publishType        = $_POST['publish_type'];
    $errors             = [];

    if (empty($id) || !is_numeric($id)) {
        $errors[] = 'Valid blog ID is required';
    }
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

    

    $mysqli         = new mysqli('localhost', 'u448113253_expontinst', 'b@^8XSJ1X', 'u448113253_expontinst');
    $blog_id        = $_POST['id'];
    // Fetch the blog details using the blog ID
    $sql            = "SELECT * FROM blogs WHERE id = ?";
    $stmt           = $mysqli->prepare($sql);
    $stmt->bind_param("i", $blog_id);
    $stmt->execute();
    $result         = $stmt->get_result();
    $blog           = $result->fetch_assoc();
    $oldImagePath   = '../uploads/blogImages/'. $blog['image']; 
    $imageName      = $blog['image']; 

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
            if (file_exists($oldImagePath) && $blog['image']!=null) {
                unlink($oldImagePath); // Delete the old image
            }
    
            $uploadDir = '../uploads/blogImages/';
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
        $stmt = $mysqli->prepare("UPDATE blogs SET title=?, meta_title=?, description=?, meta_description=?, meta_keywords=?, content=?, link=?, publish_type=?, image=? WHERE id=?");
        $stmt->bind_param('sssssssssi', $title, $meta_title, $description, $meta_description, $meta_keywords, $content, $link, $publishType, $imageName,$id);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Blog successfully updated']);
        } else {
            echo json_encode(['message' => 'Failed to update blog']);
        }

        $stmt->close();
        $mysqli->close();
    }
}