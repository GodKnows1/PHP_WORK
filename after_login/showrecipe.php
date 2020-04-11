<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Home | Khana-Kosh</title>
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
        
        <p id="p1"> </p>
        <?php
            $servername = "localhost";
            $usernam = "root";
            $password = "";
            $dbname = "project_iwp";
            $conn = mysqli_connect($servername, $usernam, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            echo $_POST['masaladosa'];
        ?>
        
    </div>
	
</body>
</html>