<?php

class PHP_Email_Form
{
    public $to = null;
    public $from_name = null;
    public $from_email = null;
    public $subject = null;
    public $message = '';
    public $headers = '';

    public $smtp = array(
        'host' => 'localhost',
        'username' => '',
        'password' => '',
        'port' => '587'
    );

    public $error = null;

    public function __construct()
    {
        $this->from_name = 'Contact Form';
        $this->from_email = 'contact@example.com';
        $this->reply_to = 'contact@example.com';
    }

    public function add_message($message, $name = null)
    {
        $this->message .= ($name ? "$name: " : '') . $message . "<br>";
    }

    public function send()
    {
        $this->headers = "MIME-Version: 1.0" . "\r\n";
        $this->headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $this->headers .= "From: {$this->from_name} <{$this->from_email}>" . "\r\n";

        // Uncomment below if you want to use SMTP to send emails
        /*
        if ($this->smtp) {
            $this->headers .= "Reply-To: {$this->reply_to}" . "\r\n";
            if (!empty($this->smtp['host'])) {
                ini_set('SMTP', $this->smtp['host']);
                ini_set('smtp_port', $this->smtp['port']);
                ini_set('sendmail_from', $this->from_email);

                $this->headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
                $this->headers .= "X-Priority: 1" . "\r\n";

                $this->error = mail($this->to, $this->subject, $this->message, $this->headers);
            }
        } else {
            $this->error = mail($this->to, $this->subject, $this->message, $this->headers);
        }
        */

        // Uncomment above if you want to use SMTP to send emails

        // Comment below if you want to use SMTP to send emails
        $this->error = mail($this->to, $this->subject, $this->message, $this->headers);
        // Comment above if you want to use SMTP to send emails

        if (!$this->error) {
            return false;
        }
        return true;
    }
}
?>
