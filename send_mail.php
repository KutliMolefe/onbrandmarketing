<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    
    if ($name && $email && $subject && $message) {
       
        $to = "info@onbrandmarketing.co.za"; 
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
       
        $email_subject = "Contact Form: $subject";
        $email_body = "You have received a new message from your website contact form.\n\n";
        $email_body .= "Here are the details:\n";
        $email_body .= "Name: $name\n";
        $email_body .= "Email: $email\n";
        $email_body .= "Subject: $subject\n";
        $email_body .= "Message:\n$message\n";

       
        if (mail($to, $email_subject, $email_body, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Sorry, something went wrong. Please try again later.";
        }
    } else {
        echo "Please fill in all fields correctly.";
    }
} else {
    echo "Invalid request method.";
}
?>
