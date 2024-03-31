<?php
// Check if the delete button is clicked and a book ID is sent
if (isset($_POST['delete']) && isset($_POST['book_id'])) {
    require_once '../database/dbh.php';
    require_once '../classes/Book.php';

    $db = new Dbh();
    $pdo = $db->getPdo(); // Get PDO instance from Dbh class

    $book_id = $_POST['book_id'];

    $book = new Book($pdo);
    $success = $book->deleteBook($book_id);

    if ($success) {
        echo "<script>alert('Book deleted successfully!'); window.location.href='products.php';</script>";
    } else {
        echo "<script>alert('Failed to delete the book.'); window.location.href='products.php';</script>";
    }
}
?>