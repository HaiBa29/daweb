<?php
class PHP_Email_Form {
    private $to = "";
    private $from_name = "BikeBuzz";
    private $from_email = "bikebuzz@contact.com";
    private $subject = "Email confirmation of appointment";
    private $message = "We have received your appointment email, we will call you as soon as possible!";
    private $headers = "MIME-Version: 1.0\r\nContent-Type: text/html; charset=UTF-8\r\n";
    private $ajax = false;

    public function add_message($message, $label = "") {
        if ($label != "") {
            $this->message .= "<strong>$label:</strong> ";
        }
        $this->message .= $message . "<br>";
    }

    public function send() {
        $this->headers .= "From: $this->from_name <$this->from_email>\r\n";

        if (mail($this->to, $this->subject, $this->message, $this->headers)) {
            if ($this->ajax) {
                echo 'OK';
            } else {
                return true;
            }
        } else {
            if ($this->ajax) {
                echo 'Could not send mail! Please check your PHP mail configuration.';
            } else {
                return false;
            }
        }
    }
}
?>
