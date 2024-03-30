

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body>
       <div class="container">
       <div class="row" >
       <div class="col-lg-12 text-center border rounded bg-light my-5 ">
              <h1 class="text-center">MY CART</h1>
       </div>
       
<div class="col-lg-8">
     <table class="table">
   <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">price</th>
      <th scope="col">Quantity</th>
    </tr>
  </thead>
  <tbody class="text-center">

<?php session_start();
if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            // Ensure $value is an array (associative array representing an item)
            if (is_array($value)) {
                $index=array_search($value,$_SESSION['cart']);
                echo "
                <tr>
                    <td>{$value['id']}</td>
                    <td>{$value['name']}</td>
                    <td>{$value['price']}</td>
                    <td>{$value['quantity']}</td>
                    <td><form action='index.php' method='POST'>
                    <button name='remove' class='button'>REMOVE</button>
                    <input type='hidden' name='index' value={$index}></form></td> 
                </tr>";
            }
        }
    }



?>
        
 
  </tbody>

 
 </table>

 <form action="index.php" method="POST">
 <button name="total" type="submit"  class="button" >calcul total  </button></form>
</div>


      </div>
    </div>
</body>
</html>