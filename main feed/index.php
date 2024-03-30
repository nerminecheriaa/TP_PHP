<?php
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore Main Feed</title>
    <link rel="stylesheet" href="indexStyle.css">
</head>
<body>
    <header>
        <span><img src="images/logo.png" alt="Logo" class="logo"></span>
        <nav>
            <h1>Welcome to our Bookstore</h1>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Books</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Cart</a></li>
            </ul>
        </nav>
    </header>
    <div class="content">
        <div class="background-image">
            <img src="images/LIBRERY.jpg" alt="Bookstore Image">
            <div class="text-overlay">
                <h2>Welcome to our Bookstore</h2>
                <p>Discover a world of stories waiting to be explored. From bestsellers to hidden gems, we have something for every reader.</p>
            </div>
        </div>
    </div>
    
    <main>
        <?php foreach ($books as $book): ?>
        <section class="book">
            <img src="../admin/<?php echo $book['image']; ?>" class="bookimg" alt="<?php echo $book['title']; ?>">
            <h2><?php echo $book['title']; ?> </h2>
            <p><?php echo $book['author']; ?></p>
            <p><?php echo $book['price']; ?> DT</p>
            <button>Add To Cart</button>
        </section>
        <?php endforeach; ?>
    </main>
    <footer>
        <p>&copy; 2024 Bookstore. All rights reserved.</p>
    </footer>
</body>
</html>