<?php
// Admin Dashboard - admin/index.php

// Include necessary files
require_once '../database/dbh.php'; // Include the Dbh class file
require_once '../classes/Book.php'; // Include the Book class file

// Create a new Dbh object
$dbh = new Dbh();
// Get the PDO instance from Dbh object
$pdo = $dbh->getPdo();

// Create a new Book object
$book = new Book($pdo);
// Get all books from the database
$books = $book->getAllBooks();
?>
<link rel="stylesheet" href="">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="adminStyle.css">
</head>
<body>
<header class="main-header">
    <div class="logo">
        <img src="../main feed/images/logo.png" alt="Company Logo">
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="index.php">Manage Users </a></li>
            <li><a href="products.php">Manage Data base</a></li>
        </ul>
    </nav>
    <div class="admin-actions">
        <a href="../main feed/index.php">View User Dashboard</a>
        <a href="logout.php">Logout</a>
    </div>
</header>
<main>
<main>
    <div class="admin-content">
        <h2>Manage Books</h2>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?php echo $book['title']; ?></td>
                        <td><?php echo $book['author']; ?></td>
                        <td><?php echo $book['price']; ?> DT</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

</main>
<footer>
    <p>&copy; 2024 Bookstore Admin. All rights reserved.</p>
</footer>
</body>
</html>