<?php 
    //Include constants.php for SITEURL
    include('php/connect.php');
    //1. Destory the Session
    session_destroy(); //Unsets $_SESSION['user']

    //2. REdirect to Login Page
    echo '<Script language="JavaScript"> 
        location.href = "index.php";
    </Script>';

?>