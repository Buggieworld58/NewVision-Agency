<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    /* ---------------- ADMIN EMAIL ---------------- */

    $to = "info@pixelforge.com";   // Your business email
    $subject = "New Contact Message";

    $body = "You have received a new message:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message";

    $headers = "From: $email";

    mail($to, $subject, $body, $headers);


    /* ---------------- AUTO REPLY ---------------- */

    $client_subject = "We Received Your Message";

$client_body = "
<html>
<body style='font-family:Arial;'>

<h2>Thank You for Contacting NetVision</h2>

<p>Hello $name,</p>

<p>We have received your message and our team will respond within 24 hours.</p>

<p><strong>Your Message:</strong><br>$message</p>

<br>

<p>Best Regards,<br>
NetVision Agency<br>
ogetojoshuabosire@gmail.com</p>

</body>
</html>
";

$client_headers  = "MIME-Version: 1.0" . "\r\n";
$client_headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$client_headers .= "From: ogetojoshuabosire@gmail.com";

mail($email, $client_subject, $client_body, $client_headers);

}

?>
