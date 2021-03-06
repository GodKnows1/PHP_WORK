<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign-Up | Khana-Kosh</title>
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


        <div class="form">

                <div id="signup">   
                    <h1>Sign Up for Free</h1>

                    <form action="../php_files/putdata.php" method="post">

                        <div class="top-row">
                                <label>
                                    First Name<span class="req">*</span>
                                </label>
                                <input type="text" required autocomplete="off" name='fname'/>
                                <label>
                                    Last Name<span class="req">*</span>
                                </label>
                                <input type="text"required autocomplete="off" name='lname'/>

                                <label>
                                    Email Address<span class="req">*</span>
                                </label>
                                <input type="email"required autocomplete="off" name='email'/>
                                
                                <label>
                                    Set a UserName<span class="req">*</span>
                                </label>
                                <input type="text" required autocomplete="off" name='username'/>

                                <label>
                                    Set A Password<span class="req">*</span>
                                </label>
                                <input type="password"required autocomplete="off" name='pass'/>
                                
                                <button type="submit" class="button button-block">Get Started</button>
                        </div>
                    </form>
                        
                    </div> 
                    
            <ul class="tab">
                 <li class="tab">Already a user? <a href="login.php">Log In</a></li>
            </ul>  

            </div> <!-- /form -->
            </body>
        </html>