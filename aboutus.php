<?php
// Include the necessary classes
require_once 'database/dbh.php';
require_once 'classes/book.php';

// Create a new instance of the Dbh class to establish a database connection
$dbh = new Dbh();
$pdo = $dbh->getPdo();

// Create a new instance of the Book class
$book = new Book($pdo);

// Get all books from the database
$books = $book->getAllBooks();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="/abotusstyle.css">
</head>

<body>
    <header>
        <div class="logo">
            <img src="src/logoblack-removebg.png" alt="Company Logo">
        </div>
        <nav>
            <ul>
                <li><a href="/contact/contact.php">Contact</a></li>
                <li><a href="abotusstyle.css">About Us</a></li>
                <li><a href="/main feed/index.php">Books</a></li>
            </ul>
        </nav>
        <div class="user-actions">
            <a href="cart.php">Cart</a>
            <a href="login.php">Login</a>
        </div>
    </header>

    <section id="AboutUs">
        <div class="container">
            <h1 id="titleAboutUs">About Us</h1>
            <p>Welcome to <span class="shop-name">Book Shop</span>, where our passion for literature meets your reading needs.</p>
            <p>At <span class="shop-name">Book Shop</span>, we believe that books have the power to inspire, educate, and entertain. With a carefully curated selection of titles spanning various genres, we strive to cater to every reader's taste and preference. Whether you're a lifelong bibliophile or just starting your reading journey, we have something for everyone.</p>
            <p>Our team consists of avid readers who are dedicated to providing exceptional service and helping you discover your next favorite book. From bestsellers to hidden gems, we're here to guide you through our shelves and recommend the perfect read for any occasion.</p>
            <p>But <span class="shop-name">Book Shop</span> is more than just a bookstore. We're a community hub where book lovers can come together to share their love of reading. Join us for author events, book clubs, and other literary gatherings that celebrate the written word and foster a sense of connection among readers.</p>
            <p>Thank you for choosing <span class="shop-name">Book Shop</span> as your literary destination. We look forward to serving you and being a part of your reading adventures.</p>
        </div>
    </section>

    <section id="Books">
        <div class="grid-container">
            <?php foreach ($books as $book) : ?>
                <div class="grid-item">
                    <img src="/admin/<?php echo $book['image']; ?>" id="image">
                    <p class="title"><?php echo $book['title']; ?></p>
                    <p class="Author"><?php echo $book['author']; ?></p>
                    
                    <div><span class="price"><?php echo $book['price']; ?></span> <button class="button">add to cart</button></div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

</body>

</html>
