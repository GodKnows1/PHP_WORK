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
            <li><a href="search.php" class="active">Search</a></li>
		</ul>	
		</div>

		<div>
			<?php
            $a=0;
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $arr=array();
        $search=$_POST['username'];
        $search=strtolower($search);
        $servername = "localhost";
        $usernam = "root";
        $password = "";
        $dbname = "project_iwp";
        $conn = mysqli_connect($servername, $usernam, $password, $dbname);
            // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql="SELECT * FROM recipe WHERE title LIKE '%$search%'";
        $userData=null;
        if ($result=mysqli_query($conn,$sql))
          { if(mysqli_num_rows($result)>0){ $a++;
          // Fetch one and one row
          while ($userData=mysqli_fetch_row($result)){ array_push($arr,$userData);
        echo "<div id='container'><p><b>Title:</b>";
        echo ($userData[0]); echo "</p>
            <p><b>Keyword:</b>";echo ($userData[1]); echo"</p>
            <p><b>Cuisine:</b>"; echo ($userData[2]); echo"</p>
            <p><b>Ingredients:</b>"; echo ($userData[3]); echo"</p>
            <p><b>Recipe:</b>"; echo ($userData[4]); echo"</p>
             <p><b>Posted by:</b>";if(isset($_SESSION["username"])){if($_SESSION["username"]==$userData[5]){
                 echo "You"; }}else{ echo ($userData[5]); }
        echo"</p>
        </div>";
        }
          // Free result set
          mysqli_free_result($result);
        }
        function searchh($row,$arr){
            $arr1=array_diff($row,$arr);
            if(count($arr1)==0)
                return 0;
            return 1;
        } 
        $users=explode(" ",$search);
        $foundRows=array();
        $query="SELECT * FROM users WHERE ";
        foreach($users as $name)
        {
        $query="SELECT * FROM recipe WHERE title LIKE '%$name%'";
        $res=mysqli_query($conn,$query);
        while($row=mysqli_fetch_row($res))
        { 
            if(mysqli_num_rows($res)>0) $a++;
            if(count($arr)==0){ 
                array_push($arr,$row);
                ?>
                <div id="container">
                    <p><b>Title:</b> <?php echo ($row[0]); ?></p>
                    <p><b>Keyword:</b> <?php echo ($row[1]); ?></p>
                    <p><b>Cuisine:</b> <?php echo ($row[2]); ?></p>
                    <p><b>Ingredients:</b> <?php echo ($row[3]); ?></p>
                    <p><b>Recipe:</b> <?php echo ($row[4]); ?></p>
                    <p><b>Posted by:</b> <?php echo ($row[5]); ?></p>
                </div>
                <?php
            } else{
            if(searchh($row,$arr[0])){ $a++;
                ?>
            <div id="container">
                <p><b>Title:</b> <?php echo ($row[0]); ?></p>
                <p><b>Keyword:</b> <?php echo ($row[1]); ?></p>
                <p><b>Cuisine:</b> <?php echo ($row[2]); ?></p>
                <p><b>Ingredients:</b> <?php echo ($row[3]); ?></p>
                <p><b>Recipe:</b> <?php echo ($row[4]); ?></p>
                <p><b>Posted by:</b> <?php echo ($row[5]); ?></p>
            </div>
                <?php
            
        }
        }
        }
        }
        //////////////////////////
        foreach($users as $name)
        {
        $query="SELECT * FROM recipe WHERE keyw LIKE '%$name%'";
        $res=mysqli_query($conn,$query);
        while($row=mysqli_fetch_row($res))
        { if(mysqli_num_rows($res)>0) $a++;
            if(count($arr)==0){
                array_push($arr,$row);
                ?>
                <div id="container">
                    <p><b>Title:</b> <?php echo ($row[0]); ?></p>
                    <p><b>Keyword:</b> <?php echo ($row[1]); ?></p>
                    <p><b>Cuisine:</b> <?php echo ($row[2]); ?></p>
                    <p><b>Ingredients:</b> <?php echo ($row[3]); ?></p>
                    <p><b>Recipe:</b> <?php echo ($row[4]); ?></p>
                    <p><b>Posted by:</b> <?php echo ($row[5]); ?></p>
                </div>
                <?php
            } else{
            if(searchh($row,$arr[0])){
                ?>
            <div id="container">
                <p><b>Title:</b> <?php echo ($row[0]); ?></p>
                <p><b>Keyword:</b> <?php echo ($row[1]); ?></p>
                <p><b>Cuisine:</b> <?php echo ($row[2]); ?></p>
                <p><b>Ingredients:</b> <?php echo ($row[3]); ?></p>
                <p><b>Recipe:</b> <?php echo ($row[4]); ?></p>
                <p><b>Posted by:</b> <?php echo ($row[5]); ?></p>
            </div>
                <?php
            
        }
        }
        }
        }
           ////////////////////////
        mysqli_close($conn);
    } else{
        ?><center><p style="font-size:40px;"><b>No such dish is available</b></p></center> <?php
    }
        if($a==0){
            ?><center><p style="font-size:40px;"><b>No such dish is available</b></p></center> <?php
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