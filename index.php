<?php 
/* Config file with sensitive info */
require_once('config.php');


/* Mailer Configurations */
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';

 
$mail_app_pwd = $_ENV['mail_app_pwd'];
echo $mail_app_pwd;exit;

if (isset($_POST['sendMessage'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    try {
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kanasayrus.sarah@gmail.com';
        $mail->Password = 'ndlflwpxxejktotz';//ndlf lwpx xejk totz

        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('kanasayrus.sarah@gmail.com', 'Kanasayrus Sarah');
        $mail->addAddress('kanasayrus.sarah@gmail.com', 'Kanasayrus Sarah');
        $mail->addReplyTo('kanasayrus.sarah@gmail.com', 'Kanasayrus Sarah'); 
        
        
        //Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact message.';

        $mail->Body    = "<!doctype html>
        <html lang='en-US'>
        
        <head>
            <meta content='text/html; charset=utf-8' http-equiv='Content-Type' />
            <title>Contact us</title>
            <meta name='description' content=''>
            <style type='text/css'>
                a:hover {text-decoration: underline !important;}
            </style>
        </head>

         <body marginheight='0' topmargin='0' marginwidth='0' style='margin: 0px; background-color: #f2f3f8;' leftmargin='0'>
            <table cellspacing='0' border='0' cellpadding='0' width='100%' bgcolor='
                style='@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;'>
                <tr>
                    <td>
                    Name $name
                    </td>
                    <td>
                    Email $email 
                    </td>
                    <td>
                    Message $message
                    </td>
                </tr>
            </table>
        </body>";
        $mail->AltBody = 'This is the body of new contact message';
        if ($mail->send()) {           
            exit('oui'); 
            $_SESSION['success'] = 'Message envoyé avec succès';
            $success = $_SESSION['success'];
            unset($_SESSION['success']);
            //header('Location: login');  
        } else {
            exit('non');
            $_SESSION['err'] = "Échec, veuillez réessayer plus tard";        
            $err = $_SESSION['err'];
            unset($_SESSION['err']);
        }
    
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        exit;
    }
}

?>


<html>
	<head>
		<title>Strongly Typed by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>
    <body class="homepage is-preload">
        <div class="container">
            <h2>Alerts</h2>
            <div class="alert alert-success">
                <strong>Success!</strong> This alert box could indicate a successful or positive action.
            </div>
            <div class="alert alert-info">
                <strong>Info!</strong> This alert box could indicate a neutral informative change or action.
            </div>
            <div class="alert alert-warning">
                <strong>Warning!</strong> This alert box could indicate a warning that might need attention.
            </div>
            <div class="alert alert-danger">
                <strong>Danger!</strong> This alert box could indicate a dangerous or potentially negative action.
            </div>
        </div>

        <div class="alert alert-success">
            <strong>Success!</strong> You should <a href="#" class="alert-link">read this message</a>.
        </div>

        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Indicates a successful or positive action.
        </div>
        <section id="footer">
            <div class="container">
                <header>
                    <h2>Questions or comments? <strong>Get in touch:</strong></h2>
                </header>
                <div class="row">
                    <div class="col-6 col-12-medium">
                        <section>
                            <form method="POST" action="index.php">
                                <div class="row gtr-50">
                                    <div class="col-6 col-12-small">
                                        <input name="name" placeholder="Name" type="text" required/>
                                    </div>
                                    <div class="col-6 col-12-small">
                                        <input name="email" placeholder="Email" type="email" />
                                    </div>
                                    <div class="col-12">
                                        <textarea name="message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="form-button-submit button icon solid fa-envelope" type="submit" name="sendMessage">
                                            Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>