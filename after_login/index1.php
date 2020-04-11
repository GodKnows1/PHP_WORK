<?php
session_start();
if(isset($_GET['logout'])){
    unset($_SESSION['username']);
    unset($_SESSION['pass']);
    unset($_SESSION['wrong']);
    header("Location:index1.php");
}
?>
<style>
    p{
        text-align: justify;
    }
</style>
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
                <a href="Thai.php">Thai</a>
                <a href="Mexican.php">Mexican</a>
                <a href="French.php">French</a>
                <a href="Italian.php">Italian</a>
                </div>
                </li>
			<li><a href="featured.php">Featured Recipes</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="post.php">Post Your Recipe</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="yourrec.php"></a></li>
		</ul>	
		</div>

		<div id="main">
			<h1>Welcome</h1>
			<p>Family recipes are a way of keeping our ancestry alive, as well as a part of ourselves. Food appeals to all five of our senses and because of this it can evoke vivid memories of our childhood, of our relationships with family members who have passed away and of who we were during that time period. <i>Food can remind us of experiences long forgotten </i>and allow us to relive feelings of comfort, satisfaction or excitement. Preserving and sharing family recipes allows us to access these emotions any time we choose, whether it's a holiday or a simple occasion we want to make special.</p>
			
            <p>Documenting family recipes keeps part of the legacy of our relatives and loved ones alive. Each cook in a family contributes her own flavor and style. "No one who cooks, cooks alone". Even at his/her most solitary, a cook in the kitchen is surrounded by generations of cooks past, the advice and menus of cooks present, the wisdom of cookbook writers." As we record the thoughts, ideas and processes of our traditional family meals we create an heirloom that will be handed down to our children, grandchildren and great grandchildren. We build a bridge by which our loved ones can learn about who we are, even after we are gone from this world. Part of knowing the path ahead is to understand where you come from. This legacy of food passed down from one generation to another is a tool, a family tree of foods, a line that can be traced for decades into the past and the future.</p>
			<p> Not only will these recipes allow you to create meals that are a meaningful experience, but they will also inspire you to create your own versions of dishes, to add your own flavor and style. You will take what your family has given to you and infuse it with your own meaning and power.</p>
		</div>

		<div id="sidebar">
			<h3>Hey There!</h3>
			<p>
				Our website allows you to share your sterling recipes among others harbouring the same enthusiasm for cooking as yours, and search for recipes for the cuisines you'd like to prepare to satisfy your tastebuds.
			</p>
			
			<div class="user">
                <?php if(!isset($_SESSION['username'])){ ?>
                <form method="post" action="checkdata.php">
				<div>
					<label>User Name</label><br>
					<input type="text" name="username" autocomplete="off" required>
				</div>
				<div>
					<label>Password</label><br>
					<input type="password" name="pass" autocomplete="off" required>
				</div>
				<button type="submit">LOG IN</button>
			</form>
                <p>Not a User? <a class="signup" href="signup.php">Sign Up</a></p>
                <?php } else{?>
                <div class="fire" style="color:red; border-color: blueviolet; border-style:dashed; border-radius:20px; width:200px; height:60px; padding:4px;"><h1> Hello <?php echo $_SESSION['username']; ?></h1></div><br>
                <table>
                    <tr><td>
                <button type="submit" style="padding:10px; margin:5px;"><a href="?logout='1'">LOGOUT</a></button></td><td>
                <button style="padding:10px;  margin:5px;"><a href="yourrec.php">Your Posts</a></button></td></tr></table>
                <?php }?>
			</div>
			
		</div>

		<div class="clr">
		</div>

		<div id="footer">
			<p>Copyright &copy; 2019</p>
		</div>
	</div>
	
</body>
</html>