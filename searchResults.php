<?php
// Report all error information on the webpage
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db_name = "";
$db_user = "";
$db_passwd = "";
$title = $_POST["searchBox"];
$query = "";

if (isset($_POST["genre"])){
    $genre = $_POST["genre"];
    $query .= " AND Genre = '" . $genre . "'";
}
if (isset($_POST["availability"])){
    $availability = $_POST["availability"];
    $query .= " AND Availability = '" . $availability . "'";
}
if (isset($_POST["format"])){
    $format = $_POST["format"];
    $query .= " AND Format = '" . $format . "'";
}

$db = new mysqli("localhost", $db_user, $db_passwd, $db_name);
// db location,   user,    passwd,    database
if ($db->connect_errno > 0) {
    die('Unable to connect to database [' . $db->connect_error . ']');
} else {
    if ($query != "") {
        $sql = "SELECT Title FROM `books` WHERE Title LIKE '%" . $title . "%'" . $query;
        $r = $db->query($sql);
        if(mysqli_num_rows($r)===0){
            echo "No matching results";
        }
        //$result = array();
        while ($row = $r->fetch_assoc()){
            echo '<a class="links" href="bookInfo.php?id=' . $row['Title'] . '">' . $row['Title'] . '</a><br><br>';
        }
    }
    else {
        $sql = "SELECT Title FROM `books` WHERE Title LIKE '%" . $title . "%'";
        $r = $db->query($sql);
        if(mysqli_num_rows($r)===0){
            echo "No matching results";
        }
        //$result = array();
        while ($row = $r->fetch_assoc()){
            echo '<a class="links" href="bookInfo.php?id=' . $row['Title'] . '">' . $row['Title'] . '</a><br><br>';
        }
    }
}
$db->close();
?> 