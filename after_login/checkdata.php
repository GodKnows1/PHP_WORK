<?php
session_start();
?>
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

		<div id="nav">
		<ul>
			<li><a class="active" href="index1.php">Home</a></li>
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
			<li><a href="contact.php">Contact</a></li>
			<li><a href="post.php">Post Your Recipe</a></li>
            <li><a href="search.php">Search</a></li>
		</ul>	
		</div>
	</div>
	
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    $username=$_POST['username'];
    $pass=$_POST['pass'];
    $servername = "localhost";
    $usernam = "root";
    $password = "";
    $dbname = "project_iwp";

    // Create connection
    $conn = mysqli_connect($servername, $usernam, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql="SELECT * from signup WHERE username='$username' AND pass='$pass'";
    
    if ($res=mysqli_query($conn, $sql)) {
        if(isset($_SESSION['username'])){
            echo "An account is already logged in...";?>
            <p id="ppp"></p>
            <script>
                function sleep(ms) {
                  return new Promise(resolve => setTimeout(resolve, ms));
                }
                async function demo() {
                  for (let i = 5; i >= 0; i--) {
                      await sleep(1000);
                    document.getElementById("ppp").innerHTML="Redirecting in " + i;
                      
                  }
                    window.location.href='post.php';
                }
                demo();
            </script>
        <?php
            //header("Location: post.php");
        }
        else{
            if(mysqli_num_rows($res)>0){
                echo "Found";
                $_SESSION['wrong']="0";
                $_SESSION['username']=$username;
                $_SESSION['pass']=$pass;
                header("Location: post.php");
            } else if(!isset($_SESSION['wrong'])){
                $_SESSION['wrong']="1";
                ?><script>alert("Wrong pass or username");</script> <?php
                header("Location: login.php");
                
            }else{
                $_SESSION['wrong']="1";
                ?><script>alert("Wrong pass or username");</script> <?php
                header("Location: login.php");
            }
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>