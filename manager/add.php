<?php
ob_start();
include 'database/DBController.php';
if(isset($_POST['addEmployee']))
{
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $mname = $_POST['middlename'];
    $gen = $_POST['gender'];
    $email = $_POST['email_address'];
    $phone = $_POST['phonenumber'];
    $jobb = $_POST['jobs'];
    $hdate = $_POST['hireddate'];
    $prov = $_POST['province'];
    $cit = $_POST['city'];
        $sql1 = "INSERT INTO location
        (location_id, province, city)
        VALUES (Null,'$prov','$cit')";
        if (mysqli_query($conn, $sql1)) {
            header("Location: index.php?page=employee&status=added");
        } else {
            header("Location: index.php?page=employee&status=fail_added");
        }
        $sql2 = "INSERT INTO employee
        (employee_id, firstname, lastname, middlename, gender, email, phone_number, job_id, hired_date, location_id)
        VALUES (Null,'{$fname}','{$lname}','{$mname}','{$gen}','{$email}','{$phone}','{$jobb}','{$hdate}',(SELECT MAX(location_id) FROM location))";
        if (mysqli_query($conn, $sql2)) {
            header("Location: index.php?page=employee&status=added");
        } else {
            header("Location: index.php?page=employee&status=fail_added");
        }
        $sql3 = "INSERT INTO users
        (user_id, employee_id, username, password, type_id)
        VALUES (Null,(SELECT MAX(employee_id) FROM employee),'','','$jobb' )";
        if (mysqli_query($conn, $sql3)) {
            header("Location: index.php?page=employee&status=added");
        } else {
            header("Location: index.php?page=employee&status=fail_added");
        }
        mysqli_close($conn);
}
if(isset($_POST['addCustomer']))
{
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $phone = $_POST['phonenumber'];
        $sql = "INSERT INTO customer
        (cust_id, firstname, lastname, phone_number)
        VALUES (Null,'$fname', '$lname','$phone')";
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php?page=customer&status=added");
        } else {
            header("Location: index.php?page=customer&status=fail_added");
        }
        mysqli_close($conn);
}
if(isset($_POST['addSupplier']))
{
    $cname = $_POST['compname'];
    $phone = $_POST['phonenumber'];
    $prov = $_POST['province'];
    $cit = $_POST['city'];
        $sql1 = "INSERT INTO location
        (location_id, province, city)
        VALUES (Null,'$prov','$cit')";
        if (mysqli_query($conn, $sql1)) {
            header("Location: index.php?page=supplier&status=added");
        } else {
            header("Location: index.php?page=supplier&status=fail_added");
        }
        $sql2 = "INSERT INTO supplier
        (supplier_id, company_name, phone_number, location_id)
        VALUES (Null,'$cname','$phone',(SELECT MAX(location_id) FROM location))";
        if (mysqli_query($conn, $sql2)) {
            header("Location: index.php?page=supplier&status=added");
        } else {
            header("Location: index.php?page=supplier&status=fail_added");
        }
        mysqli_close($conn);
}
if(isset($_POST['addProduct']))
{
    $pname = $_POST['prodname'];
    $pprice = $_POST['pur_price'];
    $markup = $pprice * 0.20;
    $sellP = $pprice + $markup;
    $unit = $_POST['produnit'];
    $supp = $_POST['supplierid'];
    $qty = $_POST['pur_qty'];
    $code= $_POST['pcode'];
    $exdate = $_POST['expiredate'];
    $dedate = $_POST['deldate'];
    $status = $_POST['status'];
        $sql1 = "INSERT INTO product
        (product_id, product_name, unit, percentage)
        VALUES (Null,'$pname','$unit', Null)";
        if (mysqli_query($conn, $sql1)) {
            header("Location: index.php?page=prod_purchase&status=added");
        } else {
            header("Location: index.php?page=prod_purchase&status=fail_added");
        }

        $sql2 = "INSERT INTO product_delivery
        (d_code, supplier_id, del_date, status)
        VALUES (Null,'$supp','$dedate', '$status')";
        if (mysqli_query($conn, $sql2)) {
            header("Location: index.php?page=prod_purchase&status=added");
        } else {
            header("Location: index.php?page=prod_purchase&status=fail_added");
        }

        $sql3 = "INSERT INTO product_details
        (item_id, d_code, product_code, product_id, purchase_unit_price, expiry_date, quantity_stock, date_stock_in, selling_unit_price)
        VALUES (Null,(SELECT MAX(d_code) FROM product_delivery),'$code',(SELECT MAX(product_id) FROM product),'$pprice','$exdate','$qty', '' ,'$sellP')";
        if (mysqli_query($conn, $sql3)) {
            header("Location: index.php?page=prod_purchase&status=added");
        } else {
            header("Location: index.php?page=prod_purchase&status=fail_added");
        }
        mysqli_close($conn);
}
ob_end_flush(); 
?>
