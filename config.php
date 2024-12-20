<?php 

session_start();

require 'vendor/vlucas/phpdotenv/src/Dotenv.php';

/* Mailer Configurations */
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';

define('DIR_VENDOR', __DIR__.'/vendor/');

if (file_exists(DIR_VENDOR . 'autoload.php')) {
    require_once(DIR_VENDOR . 'autoload.php');
}
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

