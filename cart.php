
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
        .text-middle{
            padding-left: 40%;
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
    </style>
</head>
<body class="page">
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
                    <form method='POST' action='order.php'> <!-- Use a single form for both actions -->
                    
                    
    <?php
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if (is_array($value)) {
                $index = array_search($value, $_SESSION['cart']);
                echo "
                <tr>
                    <td>{$value['isbn']}</td>
                    <td>{$value['title']}</td>
                    <td>{$value['price']}</td>
                    <td>{$value['quantity']}</td>
                    <td>
                        <button type='submit' name='remove' class='button'>REMOVE</button> <!-- Move the button inside the form -->
                        <input type='hidden' name='index' value={$index}>
                        

                        <input type='hidden' name='isbn[]' value='{$value['isbn']}'> <!-- Hidden input for isbn -->
                        <input type='hidden' name='quantity[]' value='{$value['quantity']}'> <!-- Hidden input for quantity -->
                    </td> 
                </tr>
                ";
            }
        }
    }
    ?>

 <!-- Specify action as order.php -->
    <button type="submit" class="total-btn">Order Now</button>
</form>


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