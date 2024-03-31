
<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shopping Cart</title>
    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="cartStyle.css">
   
</head>
<body class="page">
<header class="main-header">
    <div class="logo">
        <img src="main feed/images/logo.png" alt="Company Logo">
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="contact/contact.php">Contact</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="main feed/index.php">Books</a></li>
        </ul>
    </nav>
    <div class="user-actions">
        <a href="cart.php">Cart</a>
        <a href="login.php">Login</a>
    </div>
</header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1>MY CART</h1>
            </div>

            <div class="col-lg-8 mx-auto">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ISBN</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

<?php
if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            // Ensure $value is an array (associative array representing an item)
            if (is_array($value)) {
                $index=array_search($value,$_SESSION['cart']);
                echo "
                <tr>
                    <td>{$value['isbn']}</td>
                    <td>{$value['title']}</td>
                    <td>{$value['price']}</td>
                    <td>{$value['quantity']}</td>
                    <td><form action='cart.php' method='POST'>
                    <button name='remove' class='button'>REMOVE</button>
                    <input type='hidden' name='isbnToRemove' value='{$value['isbn']}'></form></td>     
                </tr>";
            }
        }
    }



?>

<?php     

if (isset($_POST['remove'])) {
    $isbnToRemove = $_POST['isbnToRemove'];

    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['isbn'] == $isbnToRemove) {
            if ($_SESSION['cart'][$key]['quantity'] > 1) {
                $_SESSION['cart'][$key]['quantity'] -= 1;
            } else {
                unset($_SESSION['cart'][$key]);
            }
            // Reindex 
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            break; // Stop the loop after finding and handling the item
        }
    }
    // Refresh page to show updated cart
    echo "<script>window.location.href='cart.php';</script>";
}



?>
        
 
        </tbody>
                </table>
                <form method="POST" class="text-right">
                       <button name="total" type="submit" class="total-btn">Calculate Total</button>
                </form>
            </div>
        </div>
    </div>
<?php 
if (isset($_POST['total'])) {
    require_once 'database/dbh.php';
    require_once 'classes/ShoppingCart.php'; 

    $pdo = (new Dbh())->getPdo();
    $cart = new ShoppingCart($pdo);
    $totalPrice = $cart->totalprice();
    
    // Display the total price
    echo " <div class='text-center my-4'>
    <strong class='d-block'>Total Price:</strong>
    <span class='display-4'>{$totalPrice} DT</span>
   </div>";
}
?>
 <!-- Bootstrap JS, Popper.js, and jQuery -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>   