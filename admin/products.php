<?php
// Include necessary files
require_once '../database/dbh.php';
require_once '../classes/Book.php';

// Create instance of Dbh class
$db = new Dbh();
$pdo = $db->getPdo(); // Get PDO instance from Dbh class

// Create instance of Book class
$book = new Book($pdo);

// Fetch all books from the database
$books = $book->getAllBooks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product page</title>
    <link rel="stylesheet" href="../css/poductsstyle.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="insert.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <h1>Product details:</h1>
                    </div>

                    <div class="input-field">
                        <label class="form-label">Title</label>
                        <input type="text" name="name" placeholder="Enter Book title">
                    </div>

                    <div class="input-field">
                        <label class="form-label">Author</label>
                        <input type="text" name="author" placeholder="Enter the author name">
                    </div>

                    <div class="input-field">
                        <label class="form-label">Book Price</label>
                        <input type="text" name="price" placeholder="Enter book price">
                    </div>

                    <div class="input-field">
                        <label class="form-label" for="image">Image</label>
                        <label class="file-upload-container" for="bimage-upload">
                            <input type="file" id="bimage-upload" class="file" name="image" style="display: none;">
                            <span class="file-custom-button">Choose File</span>
                        </label>
                    </div>

                    <button type="submit" name="submit">Upload</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Fetch data -->
    <div class="table-container">
        <table class="table table-striped">
            <thead>
                <th>id</th>
                <th>title</th>
                <th>author</th>
                <th>Price</th>
                <th>image</th>
                <th>delete</th>
            </thead>
            
            <tbody>
                <?php foreach ($books as $row): ?>
                <tr>
                    <td><?= $row['isbn'] ?></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['author'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><img src="<?= $row['image'] ?>"></td>
                    <td>
                        <form action="delete.php" method="POST">
                            <input type="hidden" name="book_id" value="<?= $row['isbn'] ?>">
                            <button type="submit" name="delete" class="deletebtn">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>