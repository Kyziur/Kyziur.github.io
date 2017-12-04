<?php

# Database connection
$servername = "localhost";
$username = "defaultUser";
$password = "12345";  

$connection = mysqli_connect($servername, $username, $password);
/* change character set to utf8 */
if (!$connection->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
    exit();
} else {

}
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'book_corner');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}


?>
  