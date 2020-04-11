<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
    $title=$_POST['title'];
    $key=$_POST['key'];
    $cuisine=$_POST['cuisine'];
    $ingre=$_POST['ingre'];
    $recipe=$_POST['recipe'];
    
    $servername = "localhost";
    $usernam = "root";
    $password = "";
    $dbname = "project_iwp";
    if(!isset($_SESSION['username'])){
?>
<!----- -->
<html>
    <head>
	<title>Home | Khana-Kosh</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    </head>
    <body>
        <p id="ppp"></p>
            <script>
                function sleep(ms) {
                  return new Promise(resolve => setTimeout(resolve, ms));
                }
                async function demo() {
                  for (let i = 5; i >= 0; i--) {
                      await sleep(1000);
                    document.getElementById("ppp").innerHTML="Not logged in Redirecting in " + i;
                      
                  }
                    window.location.href='login.php';
                }
                demo();
            </script>
        </body>
</html>
<!----- -->
<?php
    } else{
            $u=$_SESSION['username'];
            // Create connection
            $conn = mysqli_connect($servername, $usernam, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
        $key=strtolower($key);
            $sql = "INSERT INTO recipe VALUES ('$title','$key','$cuisine','$ingre','$recipe','$u')";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
                header("Location: featured.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            $key=strtolower($key);
            $sql1="INSERT INTO keywords VALUES('$key')";
            
            mysqli_close($conn);
    }
}
    
?>