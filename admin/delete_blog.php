<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Database connection
    $mysqli = new mysqli('localhost', 'u448113253_expontinst', 'b@^8XSJ1X', 'u448113253_expontinst');

    if ($mysqli->connect_error) {
        die('Database connection failed: ' . $mysqli->connect_error);
    }

    // Delete blog post
    $stmt = $mysqli->prepare("SELECT image FROM blogs WHERE id=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $blog = $result->fetch_assoc();
    if ($blog) {
        // Delete the associated image if it exists
        $imagePath = '../uploads/blogImages/' . $blog['image'];
        if ($blog['image'] != null && file_exists($imagePath)) {
            unlink($imagePath); // Delete the old image
        }

        // Now delete the blog post
        $stmt = $mysqli->prepare("DELETE FROM blogs WHERE id=?");
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            echo json_encode(['message' => 'Blog successfully deleted']);
        } else {
            echo json_encode(['message' => 'Failed to delete blog']);
        }
    } else {
        echo json_encode(['message' => 'Blog not found']);
    }

    $stmt->close();
    $mysqli->close();
}