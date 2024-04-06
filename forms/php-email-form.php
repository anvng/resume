<?php

class PHP_Email_Form
{
    public $to = null;
    public $from_name = null;
    public $from_email = null;
    public $subject = null;
    public $message = '';
    public $headers = '';
    public $error = null;

    public function __construct()
    {
        $this->from_name = 'Contact Form';
        $this->from_email = 'anvndev@gmail.com.com';
    }

    public function add_message($message, $name = null)
    {
        $this->message .= ($name ? "$name: " : '') . $message . "\n";
    }

    public function send()
    {
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "From: {$this->from_name} <{$this->from_email}>\r\n";

        // Send email
        $this->error = !mail($this->to, $this->subject, $this->message, $headers);

        return !$this->error;
    }
}
?>
