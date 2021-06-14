<?php 

    //Include constants.php file here
    include('php/connect.php');

    // 1. get the ID of Admin to be deleted
    $order_id = $_GET['order_id'];

    //2. Create SQL Query to Delete Admin
    $sql = "DELETE FROM food_order WHERE order_id = '$order_id'";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {
        //Query Executed Successully and Admin Deleted
        //echo "Admin Deleted";
        //Create SEssion Variable to Display Message
        //$_SESSION['delete'] = "<div class='success'>Order Deleted Successfully.</div>";
        //Redirect to Manage Admin Page
        echo '<Script language="JavaScript"> 
            location.href = "customer_dashboard.php";
        </Script>';
    }
    else
    {
        //Failed to Delete Admin
        //echo "Failed to Delete Admin";

        //$_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
        //header('location:'.SITEURL.'admin/manage-admin.php');
    }

    //3. Redirect to Manage Admin page with message (success/error)

?>