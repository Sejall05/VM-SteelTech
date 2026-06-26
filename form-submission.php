<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone'])) {

        $name = htmlspecialchars(trim($_POST['name']));
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $phone = htmlspecialchars(trim($_POST['phone']));
        $message = htmlspecialchars(trim($_POST['message']));

        if ($email) {

            $to = "sj9974200@gmail.com";
            $subject = "New Contact Form Submission";

            $body = "Name: $name\n";
            $body .= "Email: $email\n";
            $body .= "Phone: $phone\n";
            $body .= "Message:\n$message";

            $headers = "From: noreply@yourdomain.com\r\n";
            $headers .= "Reply-To: $email\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

            if (mail($to, $subject, $body, $headers)) {

                echo "
                <script>
                    alert('Form submitted successfully!');
                    window.location.href='index.html';
                </script>
                ";

            } else {

                echo "Error sending email.";

            }

        } else {

            echo "Invalid email address.";

        }

    } else {

        echo "Please fill all required fields.";

    }

}

?>