<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Database connection
    $mysqli = new mysqli('localhost', 'u448113253_expontinst', 'b@^8XSJ1X', 'u448113253_expontinst');

    if ($mysqli->connect_error) {
        die('Database connection failed: ' . $mysqli->connect_error);
    }

    // Delete blog post
    $stmt = $mysqli->prepare("SELECT image FROM image_gallery WHERE id=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $imageGallery = $result->fetch_assoc();
    if ($imageGallery) {
        // Delete the associated image if it exists
        $imagePath = '../uploads/imageGallery/' . $imageGallery['image'];
        if ($imageGallery['image'] != null && file_exists($imagePath)) {
            unlink($imagePath); // Delete the old image
        }

        // Now delete the blog post
        $stmt = $mysqli->prepare("DELETE FROM image_gallery WHERE id=?");
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Image successfully deleted']);
        } else {
            echo json_encode(['message' => 'Failed to delete Image']);
        }
        
    } else {
        echo json_encode(['message' => 'Image not found']);

    }

    $stmt->close();
    $mysqli->close();
}