
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
            $stmt = $this->pdo->prepare("SELECT isbn,title,price  FROM books WHERE  title = ?");
            $stmt->execute([$productname]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($product && $quantity > 0) {
                $item = [
                    'isbn' => $product['isbn'],
                    'title' => $product['title'],
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