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
			<li><a href="post.php"  class="active">Post Your Recipe</a></li>
            <li><a href="search.php">Search</a></li>
		</ul>	
		</div>

		<div class="form">

                <div id="signup">   
                    <h1>Post the Recipe</h1>

                    <form action="putrec.php" method="post">

                        <div class="top-row">
                                <label>
                                    Title of Recipe<span class="req">*</span>
                                </label>
                                <input type="text" required autocomplete="off" name="title"/>
                                <label>
                                    Keywords<span class="req">*</span>
                                </label>
                                <input type="text"required autocomplete="off" name="key"/>

                                <label class="cuisine">
                                    Cuisine<span class="req">*</span>
                                        <select onchange="re()" id="ss">
                                            <option>Please Select a Category</option>
                                        <option value="Indian" >Indian</option>
                                        <option value="Continental" >Continental</option>
                                        <option value="Chinese" >Chinese</option>
                                       <option value="Thai" >Thai</option>
                                        <option value="Mexican" >Mexican</option>
                                       <option value="French" >French</option>
                                       <option value="Italian" >Italian</option>
                                            </select>
                                </label>
                                <input type="text" required autocomplete="off" name="cuisine" placeholder="Write or Select" id="cuisi"/>
                                
                                <label>
                                    Ingredients<span class="req">*</span>
                                </label>
					               <textarea name="ingre" rows="10" required autocomplete="off"></textarea> 
                                <label>
                                    Way to make your yummy recipe<span class="req">*</span>
                                </label>
					               <textarea name="recipe" rows="20" required autocomplete="off"></textarea> 
                                
                                <button type="submit" class="button button-block">Get Started</button>
                        </div>
                    </form>
                    </div> 
            </div>

		<div id="footer">
			<p>Copyright &copy; 2019</p>
		</div>
	</div>
    <script>
        function re(){
            var selectBox = document.getElementById("ss");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            document.getElementById("cuisi").value=selectedValue;
        }
    </script>
</body>
</html>