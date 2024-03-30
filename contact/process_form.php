<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Set up recipient email address
    $to = "arij.mhenni@insat.ucar.tn"; // Change this to your email address

    // Set up email subject
    $subject = "New Contact Form Submission";

    // Compose the email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Phone: $phone\n";
    $email_message .= "Message:\n$message\n";

    // Set up email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Attempt to send the email
    if (mail($to, $subject, $email_message, $headers)) {
        // Email sent successfully
        echo "<script>alert('Your message has been sent successfully. We will get back to you shortly.');</script>";
        header("Location: success.html"); // Redirect to a success page
        exit();
    } else {
        // Error sending email
        echo "<script>alert('There was an error sending your message. Please try again later.');</script>";
        header("Location: error.html"); // Redirect to an error page
        exit();
    }
} else {
    // If the request method is not POST, redirect to the form page
    header("Location: contact.php");
    exit();
}
?>

