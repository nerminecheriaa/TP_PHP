<?php 
 
require_once('connection.php');
class Book {
        private $id;
        private $name;
        private $price;
        
        public function __construct($id, $name, $price) {
            $this->id = $id;
            $this->name= $name;
            $this->price = $price;
        }
        
        public function getid() {
            return $this->id;
        }
        
        public function getname() {
            return $this->name;
        }
        
        public function getPrice() {
            return $this->price;
        }
    }
    
 ?>

 
 <?php
class ShoppingCart
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
       
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function addToCart($productname, $quantity)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT id,name,price  FROM books WHERE  name = ?");
            $stmt->execute([$productname]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($product && $quantity > 0) {
                $item = [
                    'id' => $product['id'],
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'quantity' => $quantity,
                    
                ];

                // Check if the product already exists in the cart
                if (array_key_exists($productname, $_SESSION['cart'])) {
                    $_SESSION['cart'][$productname]['quantity'] += $quantity;
                } else {
                    $_SESSION['cart'][$productname] = $item;
                }

                return true; // Product added to cart successfully
            }

            return false; // Product or quantity invalid
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function getCart()
    {
        return $_SESSION['cart'];
    }
    public function removeProduct($productname) {
        unset($_SESSION['cart'][$productname]);
        $_SESSION['cart'][$productname]['quantity'] = $_SESSION['cart'][$productname]['quantity'] -1;

        }

    public function totalprice(){
        $total=0;
        $items=$this->getCart();
        foreach($items as $item){
                $total+=$item['price']* $item['quantity'];

        }
        return $total;
    }

   
}

?>

<?php  
if (session_status() == PHP_SESSION_NONE) {
        session_start();
        $cart= new ShoppingCart($pdo);
    }
    
   if ($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["add"])){
                if(isset($_SESSION['cart'])){
                    $productname = $_POST['name']; 
                    $quantity = 1; 
                    $cart->addToCart($productname, $quantity);
                     $cartItems = $cart->getCart();
                 echo "<script>alert('item successfully added');
                        window.location.href='view.php';</script>";
                 

                   
                }
        }

        if(isset($_POST["total"])){
            if(isset($_SESSION['cart'])){
                echo $cart->totalprice();
              

                      ;

            }

        }
               
        if (isset($_POST['remove'])){

                    $index=$_POST['index'];
                    unset($_SESSION['cart'][$index]);
                    $_SESSION['cart']=array_values($_SESSION['cart']);
             
            
                echo " <script> alert('item removed');
                        window.location.href='cart.php';</script>";

            
            } 
        
      
    }                 

?>


