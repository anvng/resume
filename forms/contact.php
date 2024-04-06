<?php

// Replace with your receiving email address
$receiving_email_address = 'anvndev@gmail.com';

// Include the PHP Email Form class
require_once 'php-email-form.php';

// Initialize PHP_Email_Form object
$contact = new PHP_Email_Form();

// Set email parameters
$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

// Add message parts
$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

// Send email and output result
if ($contact->send()) {
    echo 'Message sent successfully!';
} else {
    echo 'Failed to send message. Please try again later.';
}
?>
