<?php

if (isset($_POST['submit'])) {
    require_once '../database/dbh.php';
    require_once '../classes/Book.php';

    $db = new Dbh();
    $pdo = $db->getPdo(); // Get PDO instance from Dbh class

    $book_name = $_POST['name'];
    $book_author = $_POST['author'];
    $book_price = $_POST['price'];
    
    // File upload variables
    $image_name = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_error = $_FILES['image']['error'];
    
    // File destination
    $image_destination = "Uploadimage/" . $image_name;

    // Check for upload errors
    if ($image_error === UPLOAD_ERR_OK) {
        // Move the uploaded file to the destination directory
        if (move_uploaded_file($image_tmp_name, $image_destination)) {
            $book = new Book($pdo);
            $success = $book->addBook($book_name, $book_author, $book_price, $image_destination);

            if (!$success) {
                // Display error message on the same page
                echo "<script>alert('Failed to add the book. Please check the input fields.');</script>";
            } else {
                echo "<script>alert('Book added successfully!');window.location.href='products.php';</script>";
            }
        } else {
            // Failed to move uploaded file
            echo "<script>alert('Error uploading image.');window.location.href='products.php';</script>";
        }
    } else {
        // Error occurred during file upload
        echo "<script>alert('Error: " . $image_error . "');</script>";
    }
}

?>