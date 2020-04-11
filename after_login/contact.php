<?php
    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'D:\xampp\htdocs\IWPProject\PHPMailer-master\src\Exception.php';
    require 'D:\xampp\htdocs\IWPProject\PHPMailer-master\src\PHPMailer.php';
    require 'D:\xampp\htdocs\IWPProject\PHPMailer-master\src\SMTP.php';

        $msg = '';
    //Don't run this unless we're handling a form submission
    if (array_key_exists('email', $_POST)) {
        date_default_timezone_set('Etc/UTC');
        //Create a new PHPMailer instance
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP - requires a local mail server
        //Faster and safer than using mail()
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true; 
        $mail->Username = 'siddhant.pandey13@gmail.com';                 // SMTP username
        $mail->Password = 'Legendary@23';        
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->SMTPDebug = 0;
        //Use a fixed address in your own domain as the from address
        //**DO NOT** use the submitter's address here as it will be forgery
        //and will cause your messages to fail SPF checks
        $mail->setFrom('siddhant.pandey13@gmail.com', 'Khana Kosh');
        //Send the message to yourself, or whoever should receive contact for submissions
        $mail->addAddress("gpathak161999@gmail.com","Khana Kosh");
        //Put the submitter's address in a reply-to header
        //This will fail if the address provided is invalid,
        //in which case we should ignore the whole request
        if($mail->addReplyTo("gpathak161999@gmail.com","Khana Kosh")) {
            $mail->Subject = 'PHPMailer contact form';
            //Keep it simple - don't use HTML
            $mail->isHTML(false);
            $mail->Subject = 'Email From PHPMailer';
            //Build a simple message body
            $body="Email sent By: ".$_POST['email']." Name of User: ".$_POST['name']." Comments: ".$_POST['comm'];
            $mail->Body = $body;
            if (!$mail->send()) {
                $msg = 'Sorry, something went wrong. Please try again later.';
            } else {
                $msg = 'Message sent! Thanks for contacting us.';
            }
        } else {
            $msg = 'Invalid email address, message ignored.';
        }
    }
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Contact | Khana-Kosh</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
	<div id="container">
		<div id="header">
				<img src="Images/Header1.jpeg" height="150px" width="300px">
				<img src="Images/Header2.jpeg" height="150px" width="300px">	
		<h1>Khana-Kosh</h1>
		<h3> One stop site for authentic recipies.</h3>
		</div>

		<div id="nav">
		<ul>
			<li><a href="index1.php">Home</a></li>
            <li class="cuisine"><a href="cuisine.php">Cuisines</a>
               <div class="dropdown">
                <a href="Indian.php">Indian</a>
			    <a href="Continental.php">Continental</a>
                <a href="Chinese.php">Chinese</a>
                <a href="Thai.php#">Thai</a>
                <a href="Mexican.php#">Mexican</a>
                <a href="French.php#">French</a>
                <a href="Italian.php#">Italian</a>
                </div>
                </li>
			<li><a href="featured.php">Featured Recipes</a></li>
			<li><a href="contact.php" class="active" >Contact</a></li>
			<li><a href="post.php">Post Your Recipe</a></li>
            <li><a href="search.php">Search</a></li>
		</ul>	
		</div>

		<div id="main">
		<div id="contact">
			<h1>Contact</h1>
			<?php if (!empty($msg)) {
                echo "<h2>$msg</h2>";
            } ?>
			<form method="Post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div id="msg">
					<label>Name</label>
					<input type="text" name="name">

					<label>Email</label>
					<input type="Email" name="email">

					<label>Message</label>
					<textarea name="comm"></textarea> 

				<button type="submit" name="Submit">Submit</button>
                </div>
			</form>
        </div>
		</div>

		<div id="sidebar">
			<h3>Hey There!</h3>
			<p>
				Our website allows you to share your sterling recipes among others harbouring the same enthusiasm for cooking as yours, and search for recipes for the cuisines you'd like to prepare to satisfy your tastebuds.
			</p>
		</div>
		
		<div class="clr">
		</div>

		<div id="footer">
			<p>Copyright &copy; 2019</p>
		</div>
	</div>       
            
</body>

</html>