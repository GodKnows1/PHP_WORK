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
			<li><a href="contact.php">Contact</a></li>
			<li><a href="post.php">Post Your Recipe</a></li>
            <li><a href="search.php">Search</a></li>
		</ul>	
		</div>
        <br>
<center><h1 style="font-size: 300%; text-decoration: underline; font-family: 'Montserrat'; color:blue;">Welcome<?php if(isset($_SESSION['username'])) 
                                            echo " ".$_SESSION['username'];
                            else{
                                echo " User ";}
                                                ?>  Your Recipes are :</h1></center>
		<div>
			<?php
            $a=0;
        $arr=array();
        $servername = "localhost";
        $usernam = "root";
        $password = "";
        $dbname = "project_iwp";
        $conn = mysqli_connect($servername, $usernam, $password, $dbname);
            // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $varr=$_SESSION["username"];
        $sql="SELECT * FROM recipe WHERE username = '$varr'";
        $userData=null;
        if ($result=mysqli_query($conn,$sql))
          { if(mysqli_num_rows($result)>0){ $a++;
          // Fetch one and one row
          while ($userData=mysqli_fetch_row($result)){ array_push($arr,$userData);
        echo "<div style='border:10px solid navy;'><p><b>&nbsp;&nbsp;Title:</b>";
        echo ($userData[0]); echo "</p>
            <p><b>&nbsp;&nbsp;Keyword:</b>";echo ($userData[1]); echo"</p>
            <p><b>&nbsp;&nbsp;Cuisine:</b>"; echo ($userData[2]); echo"</p>
            <p><b>&nbsp;&nbsp;Ingredients:</b>"; echo ($userData[3]); echo"</p>
            <p><b>&nbsp;&nbsp;Recipe:</b>"; echo ($userData[4]); echo"</p>
             <p><b>&nbsp;&nbsp;Posted by:</b>";if(isset($_SESSION["username"])){if($_SESSION["username"]==$userData[5]){
                 echo "You"; }}else{ echo ($userData[5]); }
        echo"</p>
        </div><br>";
        }
          // Free result set
          mysqli_free_result($result);
        }
            
        } 
?>
		</div>

		<div class="clr">
		</div>

		<div id="footer">
			<p>Copyright &copy; 2019</p>
		</div>
	</div>
	
</body>
</html>