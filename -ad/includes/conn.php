<?php
/* Local Database*/

$servername = "localhost";
$username = "u402441359_btn";
$password = "#Bdtwebplatform1";
$dbname = "u402441359_bt";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
