<!DOCTYPE html>

<html lang = "en">

    <link rel="stylesheet" href="design.css">

    <header id= "bar">
            <h1> 
            <?php
            session_start();
            $user = $_SESSION["username"];
            ?>
            	<div id="title">AhLibrary</div>
            	
                <div id="user">Welcome, <?= $user ?>! &nbsp; </div>
                
                <div id="menu">
                    <ul>
                    	<li><a href="homePage.php">Home</a></li>
                        <li><a href="searchPage.php">Search</a></li>
                        <li><a href="userProfile.php">User Profile</a></li>
                        <li><a href="loginPage.php">Logout</a></li>
                    </ul>
                </div>
            </h1>
    </header>
    <header>
        <p id = "content"> </p>
    </header>


</html>