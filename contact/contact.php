<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="contactstyle.css">
</head>
<body>
<header class="main-header">
    <div class="logo">
        <img src="images/logo.png" alt="Company Logo">
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="../aboutus.php">About Us</a></li>
            <li><a href="../main feed/index.php">Books</a></li>
        </ul>
    </nav>
    <div class="user-actions">
        <a href="../cart.php">Cart</a>
        <a href="../login.php">Login</a>
    </div>
</header>
    <div class="container smaller-container">
        <form method="POST" action="process_form.php">
            <div class="logo-container">
                <img src="images/logo.png" alt="Logo">
            </div>
            <h3>GET IN TOUCH</h3>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>
            <textarea id="message" name="message" rows="4" placeholder="How can we help you?" required></textarea>
            <button type="submit" name="submit">Send</button>
        </form>
    </div>
</body>
</html>
