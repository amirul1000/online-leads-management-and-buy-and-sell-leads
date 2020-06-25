<?php
    $to = 'mail@example.com';  // Your Email Address - contact.html

    $headers = 'From: Contact Form';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $comment = $_POST['comment'];
    $body = " Name: $name\n E-Mail: $email\n Subject: $subject\n Comment: $comment\n";

    $answer = $_POST['answer'];
    if ($_POST['submit'] && $answer == '7') {          // Your Answer
        if (mail ($to, $subject, $body, $headers)) {
        echo '<p class="contact-success">Thank you for contacting us.</p>';
    } else {
        echo '<p class="contact-error">Something went wrong. Please try again.</p>';
    }
    } else if ($_POST['submit'] && $answer != '7') {   // Your Answer
    echo '<p class="contact-error">Please enter the Correct verification number.</p>';
    }
?>
