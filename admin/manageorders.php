<?php
require_once '../database/dbh.php';
require_once '../classes/Order.php';

// Instantiate DB and Order
$dbh = new Dbh();
$pdo = $dbh->getPdo();
$order = new Order($pdo);

// Check if an order is being deleted
if (isset($_GET['isbn']) && isset($_GET['telephone'])) {
    $isbn = $_GET['isbn'];
    $telephone = $_GET['telephone'];
    if ($order->deleteOrder($isbn, $telephone)) {
        // Redirect back to manageOrders.php after deletion
        header("Location: manageOrders.php");
        exit();
    } else {
        echo "<p>Error deleting order.</p>";
    }
}

// Get all orders
$orders = [];
try {
    $orders = $order->getAllOrders();
} catch (PDOException $e) {
    // Handle database error
    echo "Database error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Orders</title>
    <link rel="stylesheet" href="adminStyle.css">
</head>
<body>
<header class="main-header">
    <div class="logo">
        <img src="../main feed/images/logo.png" alt="Company Logo">
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="manageorders.php">ManageOrders </a></li>
            <li><a href="products.php">Manage Books</a></li>
        </ul>
    </nav>
    <div class="admin-actions">
        <a href="../main feed/index.php">View User Dashboard</a>
        <a href="../LOGOUT.php">Logout</a>
    </div>
</header>
<main>
    <div class="admin-content">
        <h2>Manage Orders</h2>
        <table>
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Ville</th>
                    <th>Telephone</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= htmlspecialchars($order['isbn']) ?></td>
                        <td><?= htmlspecialchars($order['ville']) ?></td>
                        <td><?= htmlspecialchars($order['telephone']) ?></td>
                        <td><?= htmlspecialchars($order['quantity']) ?></td>
                        <td>
                            <a href="manageOrders.php?isbn=<?= $order['isbn'] ?>&telephone=<?= $order['telephone'] ?>" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<footer>
    <p>&copy; 2024 Bookstore Admin. All rights reserved.</p>
</footer>

</body>
</html>