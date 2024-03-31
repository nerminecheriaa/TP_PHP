
<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shopping Cart</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .page{
                background-color:#FFDFDB;   

        }
        .container {
           
            background-color:whitesmoke;
           
        }
        .table {
            box-shadow: 0 5px 15px rgba(0,0,0,.1);
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .button {
            cursor: pointer;
        }
        .button-remove {
            color: #CE6A6B;
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .button-remove:hover {
            color: #fff;
            background-color: #c82333;
            border-color: #bd2130;
        }
        .total-btn {
            background-color:black;
            color: #fff;
            padding: 10px 24px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
        }
        .text-center h1 {
            color:#CE6A6B ;
        }
        .main-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #CE6A6B;
    padding: 20px;
    color: #fff;
    height: 70px;
}

.main-header .logo img {
    width: 140px;
    height: 90px;
}

.main-header nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

.main-header nav ul li {
    display: inline;
    margin-right: 20px;
}

.main-header nav ul li a {
    text-decoration: none;
    color: #fff;
}

.main-header .user-actions a {
    text-decoration: none;
    color: #fff;
    margin-left: 20px;
}

@media screen and (max-width: 600px) {
    .main-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .main-header .logo {
        margin-bottom: 20px;
    }

    .main-header .user-actions {
        margin-top: 20px;
    }
}
    </style>
</head>
<body class="page">
<header class="main-header">
    <div class="logo">
        <img src="/main feed/images/logo.png" alt="Company Logo">
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
                            <th scope="col">ID</th>
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
                    <input type='hidden' name='index' value={$index}></form></td> 
                </tr>";
            }
        }
    }



?>

<?php     

if (isset($_POST['remove'])){

        $index=$_POST['index'];
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart']=array_values($_SESSION['cart']);
 

    echo " <script> alert('item removed');
            window.location.href='cart.php';</script>";


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