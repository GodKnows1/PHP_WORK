<?php
session_start();
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "project_iwp";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Services | Khana-Kosh</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
			<li><a  href="index1.php">Home</a></li>
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
			<li><a href="featured.php" class="active">Featured Recipes</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="post.php">Post Your Recipe</a></li>
            <li><a href="search.php">Search</a></li>
		</ul>	
		</div>

		<div id="main">
			<h1>Top Recipes For You</h1>
			<ul class="services">
				<li>
					<h3>Masala Dosa</h3>
					<p>A crispy, rice-batter crepe encases a spicy mix of mashed potato, which is then dipped in coconut chutney, pickles, tomato-and-lentil-based sauces and other condiments. It's a fantastic breakfast food that'll keep you going till lunch, when you'll probably come back for another.</p>
					<a id="getUser" data-value="masala dosa" href="#ppp">Read More</a>
				</li>

				<li>
					<h3>French Toast</h3>
					<p>French toast is like a deep-fried hug. Two pieces of toast are slathered with peanut butter or kaya jam, soaked in egg batter, fried in butter and served with still more butter and lots of syrup. A Hong Kong best food, best enjoyed before cholesterol checks.</p>
					<a id="2getUser" data-value="french toast" href="#ppp">Read More</a>
				</li>

				<li>
					<h3>Lasagna</h3>
					<p>Second only to pizza in the list of famed Italian foods, there's a reason this pasta-layered, tomato-sauce-infused, minced-meaty gift to kids and adults alike is so popular -- it just works.</p>
					<a id="3getUser" data-value="lasagna" href="#ppp">Read More</a>
				</li>

				<li>
					<h3>Sushi</h3>
					<p>Japanes people are fueled by nothing more complicated than raw fish and rice, but it's how the fish and rice is put together that makes this a global first-date favorite. The Japanese don't live practically forever for no reason -- they want to keep eating this stuff..</p>
					<a id="4getUser" data-value="sushi" href="#ppp">Read More</a>
				</li>

			</ul>
		</div>

		<div id="sidebar">
			<h3>Hey There!</h3>
			<p>
				Our website allows you to share your sterling recipes among others harbouring the same enthusiasm for cooking as yours, and search for recipes for the cuisines you'd like to prepare to satisfy your tastebuds.
			</p>
		</div>
		
		<div class="clr">
		</div>
	</div>
    <div id="userInfo"></div>
     <p id="ppp"></p>
    <div id="footer">
			<p>Copyright &copy; 2019</p>
		</div>
    <script>
    $(document).ready(function(){
        $('#getUser,#2getUser,#3getUser,#4getUser').on('click',function(){
            var userID = $(this).attr('data-value');
            var msg=encodeURIComponent(userID);
            $('#userInfo').load('getData.php?id='+msg,function(){
                var printContent = document.getElementById('userInfo');
            });
        });
    }); 
    </script>
</body>
</html>