<?php
 //Start Session
 session_start();


 //Create Constants to Store Non Repeating Values

 define('LOCALHOST', '127.0.0.1');
 define('DB_USERNAME', 'admin');
 define('DB_PASSWORD', '123456');
 define('DB_NAME', 'test');
 
 $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
 $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //SElecting Database

?>