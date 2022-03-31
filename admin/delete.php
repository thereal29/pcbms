<?php
ob_start();
include 'database/DBController.php';
if(isset($_POST['delUser']))
{
    $uid=$_POST['uid'];
    $eid=$_POST['eid'];
    $sql = "DELETE FROM `users` WHERE user_id = '".$uid."'";
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?page=accounts&status=deleted");
    } else {
        header("Location: index.php?page=accounts&status=fail_deleted");
    }
    $sql2 = "DELETE FROM `employee` WHERE employee_id = '".$eid."'";
    if (mysqli_query($conn, $sql2)) {
        header("Location: index.php?page=accounts&status=deleted");
    } else {
        header("Location: index.php?page=accounts&status=fail_deleted");
    }
    mysqli_close($conn);
}
ob_end_flush(); 
?>