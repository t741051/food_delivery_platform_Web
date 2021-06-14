<?php
    include('php/connect.php');

    $sql = "SELECT * FROM food_attribute	
					WHERE food_id = 1				 						
					";
			$res = mysqli_query($conn, $sql);
    
    if(isset($_GET['image_id'])) {
        $sql = "SELECT imageType,imageData FROM output_images WHERE imageId=" . $_GET['image_id'];
        $result = mysql_query("$sql") or die("Error: Problem on Retrieving Image BLOB
        "
        . mysql_error());
        $row = mysql_fetch_array($result);
        header("Content-type: " . $row["imageType"]);
        echo $row["imageData"];
    }
    mysql_close($conn);
?>