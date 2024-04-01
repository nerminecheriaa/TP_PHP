<?php
require_once '../database/dbh.php';
  session_start(); 
class Order
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function insertOrder($isbn, $quantity, $ville, $telephone)
    {
        $sql = "INSERT INTO commande (isbn, ville, telephone, quantity) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);

        if (!$stmt) {
            // Handle prepare error
            echo "Prepare failed: " . $this->pdo->errorInfo()[2];
            return false;
        }

        try {
            // Execute the statement for each book and quantity
            foreach ($isbn as $key => $bookIsbn) {
                $stmt->execute([$bookIsbn, $ville, $telephone, $quantity[$key]]);
            }
            return true; // Return true if insertion is successful
        } catch (PDOException $e) {
            // Handle PDOException
            echo "Execute failed: " . $e->getMessage();
            return false;
        }
    }
    // Function to get all orders
    public function getAllOrders() {
        $sql = "SELECT * FROM commande";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //Function to deete an order based on the id and isbn
    public function deleteOrder($isbn, $telephone) {
        $sql = "DELETE FROM commande WHERE isbn = :isbn AND telephone = :telephone";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':isbn' => $isbn, ':telephone' => $telephone]);
    }
}
?>


<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
        header("Location: ../login.php");

    }
    else{
    $dbh = new Dbh();
    $pdo = $dbh->getPdo();
    $order = new Order($pdo);

    if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true){
        
    echo"<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>
        <link rel='stylesheet' href='../order.css'>
    </head>
    <body>
    <header class='main-header'>
    <div class='logo'>
        <img src='../src/logo.png' alt='Company Logo'>
    </div>
    <nav class='main-nav'>
        <ul>
            <li><a href='../contact/contact.php'>Contact</a></li>
            <li><a href='../aboutus.php'>About Us</a></li>
            <li><a href='../main feed/index.php'>Books</a></li>
        </ul>
    </nav>
    <div class='user-actions'>
        <a href='../cart.php'>Cart</a>
        <a href='../LOGOUT.php'>Logout</a>
    </div>
</header>";
}


    
    $isbn = $_POST['isbn'] ?? [];
    $quantity = $_POST['quantity'] ?? [];
    $ville = $_POST['city'] ?? '';
    $telephone = $_POST['phone'] ?? '';

    
    if ($order->insertOrder($isbn, $quantity, $ville, $telephone)) {
        echo "<div id='resultinsertion'>Order inserted successfully.</div>";
    } else {
        echo "<div id='resultinsertion'>Error: Failed to insert order.</div>";
    }

    echo"
    </body>
    </html>";
}
}
?>
