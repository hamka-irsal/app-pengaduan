<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $config['protocol'] = 'smtp';
// $config['smtp_host'] = 'sandbox.smtp.mailtrap.io';
// $config['smtp_port'] = 465;
// $config['smtp_user'] = 'c035c20df001a9'; // Ganti dengan Mailtrap username
// $config['smtp_pass'] = 'abe5aaa6deaff2'; // Ganti dengan Mailtrap password
// $config['mailtype']  = 'html';  // Email dikirim dalam format HTML
// $config['charset']   = 'utf-8';
// $config['newline']   = "\r\n";  // Tambahkan baris baru untuk SMTP email
// $config['wordwrap']  = TRUE;
$config['protocol']  = 'smtp';
$config['smtp_host'] = 'sandbox.smtp.mailtrap.io';
$config['smtp_port'] = 2525;
$config['smtp_user'] = 'c035c20df001a9'; // ganti dengan Mailtrap username
$config['smtp_pass'] = 'abe5aaa6deaff2'; // ganti dengan Mailtrap password
$config['crlf']      = "\r\n";
$config['newline']   = "\r\n";
$config['mailtype']  = 'html';
$config['charset']   = 'utf-8';
$config['wordwrap']  = TRUE;



// $config = Array(
//     'protocol' => 'smtp',
//     'smtp_host' => 'sandbox.smtp.mailtrap.io',
//     'smtp_port' => 25,
//     'smtp_user' => 'c035c20df001a9',
//     'smtp_pass' => 'abe5aaa6deaff2',
//     'smtp_crypto' => 'tls',
//     'crlf' => "\r\n",
//     'newline' => "\r\n"
//   );

