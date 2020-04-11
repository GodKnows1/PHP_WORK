<html>
<head>
	<title>Contact | Khana-Kosh</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>
    <body>
        <p id="ppp"></p>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    $msg=$_POST['comm'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    if(empty($msg)||empty($email)||empty($name)){
        echo "Any field is empty";?>
        <script>
                function sleep(ms) {
                  return new Promise(resolve => setTimeout(resolve, ms));
                }
                async function demo() {
                  for (let i = 5; i >= 0; i--) {
                      await sleep(1000);
                    document.getElementById("ppp").innerHTML="Redirecting in " + i;
                      
                  }
                    window.location.href='contact.php';
                }
                demo();
            </script>
        <?php
    } else{
        //if(isset($_POST['submit'])){
        require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
            require 'path/to/PHPMailer/src/Exception.php';
            require 'path/to/PHPMailer/src/PHPMailer.php';
            require 'path/to/PHPMailer/src/SMTP.php';
        $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAuth = true;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->Username = 'gpathak161999@gmail.com';
            $mail->Password = '9868045550@1';
            $mail->setFrom('gpathak161999@gmail.com');
            $mail->addAddress('gpathak161999@gmail.com');
            $mail->Subject = 'Hello from PHPMailer!';
            $mail->Body = 'This is a test.';
            echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
        if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "Message has been sent";
     }
            //}
    }
}
?>
    </body>
</html>