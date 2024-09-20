<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\src\Exception;

class Phpmailer_lib {
    public function __construct() {
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load() {
        require_once(APPPATH.'libraries/PHPMailer/src/Exception.php');
        require_once(APPPATH.'libraries/PHPMailer/src/PHPMailer.php');
        require_once(APPPATH.'libraries/PHPMailer/src/SMTP.php');

        $mail = new PHPMailer();
        return $mail;
    }
}
