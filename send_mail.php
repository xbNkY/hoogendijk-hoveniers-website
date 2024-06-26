<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['adres'], FILTER_SANITIZE_EMAIL);
    $message_content = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        $to = "hendrikhogendijkhoveniers@gmail.com";  
        $subject = "Contact Form Submission";
        $message = "Name: $name\nEmail: $email\nMessage: $message_content"; 

        
        if (mail($to, $subject, $message)) {
            echo "Email sent successfully.";
        } else {
            echo "Failed to send email.";
        }
    } else {
        echo "Invalid email address.";
    }
} else {
    echo "Invalid request.";
}
?>