<?php
ob_start();
include 'database/DBController.php';
if(isset($_POST['addCustomer']))
{
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $phone = $_POST['phonenumber'];
        $sql = "INSERT INTO customer
        (cust_id, firstname, lastname, phone_number)
        VALUES (Null,'$fname', '$lname','$phone')";
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php?page=home&status=added");
        } else {
            header("Location: index.php?page=home&status=fail_added");
        }
        mysqli_close($conn);
}
ob_end_flush(); 
?>