<?php

$con=mysqli_connect("localhost","root","","project_iwp");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$userID = $_GET['id'];
$sql="SELECT * FROM recipe WHERE title='$userID'";
$userData=null;
if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($userData=mysqli_fetch_row($result)){?>
<div id="container">
    <p><b>Title:</b> <?php echo ($userData[0]); ?></p>
    <p><b>Keyword:</b> <?php echo ($userData[1]); ?></p>
    <p><b>Cuisine:</b> <?php echo ($userData[2]); ?></p>
    <p><b>Ingredients:</b> <?php echo ($userData[3]); ?></p>
    <p><b>Recipe:</b> <?php echo ($userData[4]); ?></p>
</div>
    <?php
}
  // Free result set
  mysqli_free_result($result);
}
mysqli_close($con);

?>

