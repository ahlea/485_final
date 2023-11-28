<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Ahlea, Angie">
        <title>Login Page</title>
        <link rel="stylesheet" href="design.css"> <!-- a style container here is called an internal style. We took it out to link the css page which is an external cascading style sheet. -->
    </head>

    <body id ="blur">
    <img class="background" src="https://media.ascensionpress.com/wp-content/uploads/2019/10/alfons-morales-YLSwjSy7stw-unsplash.jpg" alt="books">
        <div id ="clear">

            <h1>AhLibrary</h1>

            <form action="loginPage.php" method="POST">
                <input id ="loginBox" placeholder="Username" type="text" name="user" value=""><br>
                <input id ="loginBox" placeholder="Password" type="password" name="pass" value=""><br>
                <input id ="loginButton" type="submit" name="submitLogin" value="Login">
                <input id ="loginButton" type="submit" name="submitNew" value="New User">
            </form>
        
        </div>

        <?php
            // Report all error information on the webpage
            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            if (isset($_POST["submitNew"])){
                $db_name = "";
                $db_user = "";
                $db_passwd = "";

                $db = new mysqli("localhost", $db_user, $db_passwd, $db_name);
                            // db location,      user,    passwd, database

                if ($db->connect_errno > 0) {
                    die('Unable to connect to database [' . $db->connect_error . ']');
                } else {
                    $user = $_POST["user"]; //turn into string taken from https://www.geeksforgeeks.org/php-strval-function/#:~:text=The%20strval()%20function%20is,or%20double)%20to%20a%20string.
                    $pass = $_POST["pass"];

                    $check = 0; //if this is >0 then there is already a username with that user input
                    $sql = "SELECT username FROM loginTable";
                    $result = $db->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) { //info about query"https://www.w3schools.com/php/php_mysql_select.asp
                            if($row["username"] == $user){
                                $check = 1;
                                echo '<script>alert("Username already exists")</script>';
                            }
                        }
                    }

                    if($check == 0 ){
                        if(trim($user) == '') {
                            echo '<script>alert("Please enter a valid username.")</script>';
                        }
                        else if(trim($pass) == '') {
                            echo '<script>alert("Please enter a valid password.")</script>';
                        }
                        else {
                            $sql_insert = "INSERT INTO loginTable (username, pass) ".
                            "VALUES ('" . $user . "', '" . $pass . "')"; //syntax
                            $db->query($sql_insert) or die('Sorry, database operation was failed');
                            session_start();
                            $_SESSION["username"] = $user;
                            header("Location:homePage.php");
                            exit();
                        }
                    }
                }
                $db->close();
            }

            if (isset($_POST["submitLogin"])){

                $db_name = "";
                $db_user = "";
                $db_passwd = "";

                $check = 0; //check will be >0 if the username is correct and the password does not match
                $db = new mysqli("localhost", $db_user, $db_passwd, $db_name);

                if ($db->connect_errno > 0) {
                    die('Unable to connect to database [' . $db->connect_error . ']');
                } else {

                    $user = $_POST["user"]; //turn into string taken from https://www.geeksforgeeks.org/php-strval-function/#:~:text=The%20strval()%20function%20is,or%20double)%20to%20a%20string.
                    $pass = $_POST["pass"];
                    $sql = "SELECT username, pass FROM loginTable";
                    $result = $db->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
                        while($row = $result->fetch_assoc()) { //info about query"https://www.w3schools.com/php/php_mysql_select.asp
                            if($row["username"] == $user){
                                $check = 1;
                                if($row["pass"] != $pass){
                                    echo '<script>alert("Username does not match password")</script>';
                                }else{
                                    session_start();
                                    $_SESSION["username"] = $user;
                                    header("Location: homePage.php");
                                    exit();
                                }
                            }
                        }
                        if($check == 0){
                            echo '<script>alert("Username does not exist")</script>';
                        }
                    }
                }   
                $db->close();
            }
        ?>
    </body>
</html>