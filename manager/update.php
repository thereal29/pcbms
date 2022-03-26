<?php
ob_start();
include 'database/DBController.php';
if(isset($_POST['updateEmployee']))
{
    $id=$_POST['id'];
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
        $sql = 'UPDATE employee e join location l on l.location_id=e.location_id set firstname="'.$fname.'",middlename="'.$mname.'",
        lastname="'.$lname.'",
        gender="'.$gen.'", email="'.$email.'", phone_number="'.$phone.'", hired_date ="'.$hdate.'", l.province ="'.$prov.'", l.city ="'.$cit.'" WHERE
        employee_id ="'.$id.'"';
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php?page=employee&status=updated");
        } else {
            header("Location: index.php?page=employee&status=fail_updated");
        }
        mysqli_close($conn);
}
if(isset($_POST['updateAccount']))
{
    $uid=$_POST['uid'];
    $eid=$_POST['eid'];
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
    $user = $_POST['username'];
    $pass = $_POST['password'];
        $sql = 'UPDATE employee e join location l on l.location_id=e.location_id join users s on s.employee_id=e.employee_id set e.firstname="'.$fname.'",e.middlename="'.$mname.'",
        e.lastname="'.$lname.'",
        e.gender="'.$gen.'", e.email="'.$email.'", e.phone_number="'.$phone.'", e.hired_date ="'.$hdate.'", l.province ="'.$prov.'", l.city ="'.$cit.'", s.username="'.$user.'", s.password="'.md5($pass).'" WHERE
        e.employee_id ="'.$eid.'" AND s.user_id ="'.$uid.'"';
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php?page=accounts&status=updated");
        } else {
            header("Location: index.php?page=accounts&status=fail_updated");
        }
        mysqli_close($conn);
}
if(isset($_POST['updateCustomer']))
{
    $id = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $phone = $_POST['phonenumber'];
        $sql = 'UPDATE customer
        set firstname="'.$fname.'", lastname="'.$lname.'", phone_number="'.$phone.'" WHERE
        cust_id ="'.$id.'"';
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php?page=customer&status=updated");
        } else {
            header("Location: index.php?page=customer&status=fail_updated");
        }
        mysqli_close($conn);
}
if(isset($_POST['updateSupplier']))
{
    $id = $_POST['id'];
    $cname = $_POST['compname'];
    $phone = $_POST['phonenumber'];
    $prov = $_POST['province'];
    $cit = $_POST['city'];
        $sql = 'UPDATE supplier s join location l on l.location_id=s.location_id set company_name="'.$cname.'", phone_number="'.$phone.'", l.province ="'.$prov.'", l.city ="'.$cit.'" WHERE supplier_id ="'.$id.'"';
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php?page=supplier&status=updated");
        } else {
            header("Location: index.php?page=supplier&status=fail_updated");
        }
        mysqli_close($conn);
}
if(isset($_POST['updateProduct']))
{
    $id = $_POST['id'];
    $pname = $_POST['prodname'];
    $pprice = $_POST['pur_price'];
    $markup = $pprice * 0.20;
    $sellP = $pprice + $markup;
    $unit = $_POST['produnit'];
    $supp = $_POST['supplierid'];
    $qty = $_POST['pur_qty'];
    $code = $_POST['pcode'];
    $exdate = $_POST['expiredate'];
        $sql = 'UPDATE product_details p join product_delivery pd on pd.d_code = p.d_code join supplier s on s.supplier_id=pd.supplier_id join product prod on prod.product_id=p.product_id 
        set prod.product_name="'.$pname.'", p.purchase_unit_price="'.$pprice.'", p.product_code = "'.$code.'", prod.unit ="'.$unit.'", pd.supplier_id ="'.$supp.'", p.quantity_stock = "'.$qty.'",p.selling_unit_price = "'.$sellP.'", p.expiry_date="'.$exdate.'" WHERE p.item_id ="'.$id.'"';
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php?page=prod_purchase&status=updated");
        } else {
            header("Location: index.php?page=prod_purchase&status=fail_updated");
        }
        mysqli_close($conn);
}
if(isset($_POST['changeDelStat']))
{
    $id = $_POST['id'];
    $status = $_POST['status'];
    if($status == 'On Delivery'){
        $st = "Delivered";
        $recdate = date('Y-m-d');
        $sql = 'UPDATE product_details p join product_delivery pd on pd.d_code = p.d_code set pd.status ="'.$st.'", p.date_stock_in ="'.$recdate.'"  WHERE p.item_id ="'.$id.'"';
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php?page=prod_purchase&status=updated");
        } else {
            header("Location: index.php?page=prod_purchase&status=fail_updated");
        }
        mysqli_close($conn);
    }
    if($status == 'To Deliver'){
        $st = "On Delivery";
        $dedate = date('Y-m-d');
        $sql = 'UPDATE product_details p join product_delivery pd on pd.d_code = p.d_code set pd.status ="'.$st.'", pd.del_date = "'.$dedate.'"  WHERE p.item_id ="'.$id.'"';
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php?page=prod_purchase&status=updated");
        } else {
            header("Location: index.php?page=prod_purchase&status=fail_updated");
        }
        mysqli_close($conn);
    } 
}
if(isset($_POST['updateQuotation']))
{
    $id = $_POST['id'];
    $pname = $_POST['prodname'];
    $sprice = $_POST['sell_price'];
    $unit = $_POST['produnit'];
        $sql = 'UPDATE product_details p join product prod on prod.product_id=p.product_id 
        set prod.product_name="'.$pname.'", p.selling_unit_price="'.$sprice.'", prod.unit ="'.$unit.'" WHERE p.item_id ="'.$id.'"';
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php?page=prod_quotation&status=updated");
        } else {
            header("Location: index.php?page=prod_quotation&status=fail_updated");
        }
        mysqli_close($conn);
}
if(isset($_POST['updateDelivery']))
{
    $id = $_POST['id'];
    $pname = $_POST['prodname'];
    $status = $_POST['status'];
    if($status == 'On Delivery'){
        $st = "Delivered";
    }
    if($status == 'To Deliver'){
        $st = "On Delivery";
    } 
    $sql = 'UPDATE product_details p join product_delivery pd on pd.d_code = p.d_code set pd.status ="'.$st.'", prod.product_name="'.$pname.'"  WHERE p.item_id ="'.$id.'"';
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php?page=prod_purchase&status=updated");
    } else {
        header("Location: index.php?page=prod_purchase&status=fail_updated");
    }
    mysqli_close($conn);
}
if(isset($_POST['updateInventory']))
{
    $id = $_POST['id'];
    $pname = $_POST['prodname'];
    $sprice = $_POST['sell_price'];
    $unit = $_POST['produnit'];
    $supp = $_POST['supplierid'];
    $qty = $_POST['qty_stock'];
    $code = $_POST['pcode'];
    $stdate = $_POST['stockdate'];
        $sql = 'UPDATE product_details p join product_delivery pd on pd.d_code = p.d_code join supplier s on s.supplier_id=pd.supplier_id join product prod on prod.product_id=p.product_id 
        set prod.product_name="'.$pname.'", p.selling_unit_price="'.$sprice.'", p.product_code = "'.$code.'", prod.unit ="'.$unit.'", pd.supplier_id ="'.$supp.'", p.quantity_stock = "'.$qty.'", p.date_stock_in="'.$stdate.'" WHERE p.item_id ="'.$id.'"';
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php?page=inventory&status=updated");
        } else {
            header("Location: index.php?page=inventory&status=fail_updated");
        }
        mysqli_close($conn);
}
if(isset($_POST['updateCode']))
{
    $id = $_POST['id'];
    $pname = $_POST['prodname'];
    $code = $_POST['pcode'];
        $sql = 'UPDATE product_details p join product prod on prod.product_id=p.product_id 
        set prod.product_name="'.$pname.'",  p.product_code = "'.$code.'" WHERE p.item_id ="'.$id.'"';
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php?page=prod_code&status=updated");
        } else {
            header("Location: index.php?page=prod_code&status=fail_updated");
        }
        mysqli_close($conn);
}
ob_end_flush(); 
?>