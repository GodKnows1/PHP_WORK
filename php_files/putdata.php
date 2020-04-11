<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
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

$sql = "INSERT INTO signup (fname,lname,email,username,pass) VALUES ('$fname','$lname','$email','$username','$pass')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: ../after_login/login.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>
