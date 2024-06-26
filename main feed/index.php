<?php
require_once '../database/dbh.php'; // Include the Dbh class file
require_once '../classes/Book.php'; // Include the Book class file
require_once '../classes/shoppingcart.php';

// Create a new Dbh object
$dbh = new Dbh();
// Get the PDO instance from Dbh object
$pdo = $dbh->getPdo();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $cart= new ShoppingCart($pdo);
}

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
    <?php
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
        echo"<header class='main-header'>
        <div class='logo'>
            <img src='images/logo.png' alt='Company Logo'>
        </div>
        <nav class='main-nav'>
            <ul>
                <li><a href='../contact/contact.php'>Contact</a></li>
                <li><a href='../aboutus.php'>About Us</a></li>
                <li><a href='index.php'>Books</a></li>
            </ul>
        </nav>
        <div class='user-actions'>
            <a href='../cart.php'>Cart</a>
            <a href='../login.php'>Login</a>
        </div>
    </header>";
    }
    
else{
    echo"<header class='main-header'>
    <div class='logo'>
        <img src='images/logo.png' alt='Company Logo'>
    </div>
    <nav class='main-nav'>
        <ul>
            <li><a href='../contact/contact.php'>Contact</a></li>
            <li><a href='../aboutus.php'>About Us</a></li>
            <li><a href='index.php'>Books</a></li>
        </ul>
    </nav>
    <div class='user-actions'>
        <a href='../cart.php'>Cart</a>
        <a href='../LOGOUT.php'>Logout</a>
    </div>
</header>";
}


?>

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
            <form action='index.php ' method= 'POST'>
                <section class="book">
                    <img src="../admin/<?php echo $book['image']; ?>" class="bookimg" alt="<?php echo $book['title']; ?>">
                    <h2><?php echo $book['title']; ?> </h2>
                    <p><?php echo $book['author']; ?></p>
                    <div class="rating">
                        <span  class="star" onclick="setRating(1,1)">&#9733;</span>
                        <span  class="star" onclick="setRating(2,1)">&#9733;</span>
                        <span class="star" onclick="setRating(3,1)">&#9733;</span>
                        <span  class="star" onclick="setRating(4,1)">&#9733;</span>
                        <span class="star" onclick="setRating(5,1)">&#9733;</span>
                    </div>
                    <p><?php echo $book['price']; ?> DT</p>
                    <button name="add" type="submit"  class="button">Add To Cart</button>
                </section>
                <input type="hidden" name ="name" value= "<?php echo $book['title']; ?>" >
            </form>
        <?php endforeach; ?>
    </main>
    <footer>
        <p>&copy; 2024 Bookstore. All rights reserved.</p>
    </footer>

    <?php 
   
    
       if ($_SERVER["REQUEST_METHOD"]=="POST"){
            if(isset($_POST["add"])){
                    if(isset($_SESSION['cart'])){
                        $productname = $_POST['name']; 
                        $quantity = 1; 
                        $cart->addToCart($productname, $quantity);
                         $cartItems = $cart->getCart();
                     echo "<script>alert('item successfully added');
                            window.location.href='index.php';</script>";
                     
    
                       
                    }
            }

            
       }
    ?>
    
    
    
    
    

   <script> function setRating(rating,i){
        
        const stars = document.querySelectorAll(`.rating${i} .star`);
      
        // Iterate over each star, setting its state appropriately
        stars.forEach((star, index) => {
      
          if (index < rating) {
            star.classList.add('rated');
          } else {
            star.classList.remove('rated');
          }
         
        });}
      
      
      
      </script>

</body>

</html>
