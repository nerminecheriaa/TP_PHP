
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    <link rel="stylesheet" href="order.css">
</head>
<body>
    <div id="subcontainer">
    <div class="container">
        <h1>Order Form</h1>
        <form action="classes/order.php" method="POST">
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" id="city" name="city" placeholder="Enter your city" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
            </div>
            
            <?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['isbn']) && isset($_POST['quantity'])) {
        $isbns = $_POST['isbn'];
        $quantities = $_POST['quantity'];
        
        // Loop through the arrays to create hidden input fields
        foreach ($isbns as $isbn) {
            echo "<input type='hidden' name='isbn[]' value='$isbn'>";
        }
        foreach ($quantities as $quantity) {
            echo "<input type='hidden' name='quantity[]' value='$quantity'>";
        }
    }
}
?>

            <button type="submit">Submit</button>
            
        </form>
    </div>
    </div>
</body>
</html>
