<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Log In | Khana-Kosh</title>
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
        </div>
        <div id="nav">
		<ul>
			<li><a  href="index1.php">Home</a></li>
            <li class="cuisine"><a href="featured.php">Cuisines</a>
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
        <div id="login"> 
                        <center><h1>Welcome<?php if(isset($_SESSION['username'])) 
                                            echo " ".$_SESSION['username'];
                            else{
                                echo " User";}
                                                ?></h1></center>

                        <form action="searchphp.php" method="post">

                            <div class="field-wrap">
                                <label>
                                    What do you want to cook<span class="req">*</span>
                                </label>
                                <input type="text" required autocomplete="off" name="username"/>
                            </div>

                            <button class="button button-block">Cook !!</button>
                        </form>

        </div>
		<div id="footer">
			<p>Copyright &copy; 2019</p>
		</div>
    </body>
</html>