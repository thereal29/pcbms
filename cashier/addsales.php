<?php
include '../database/DBController.php';
if(isset($_POST['customer'])){
	$employee_id = $_POST['employee_id'];
	$discount = $_POST['discount'];
	$total = $_POST['totalvalue'];
	$price = $_POST['price'];
	$product = $_POST['product'];
	$customer = $_POST['customer'];
	$quantity = $_POST['quantity'];
	$reciept = array();
	
	$query = '';
	$sql = "INSERT INTO sales(cust_id,employee_id,discount,total,date) VALUES('$customer','$employee_id','$discount', '$total', NOW())";
	$result = mysqli_query($conn,$sql);

	if($result == true){
		$select = "SELECT receipt_no FROM sales ORDER BY receipt_no DESC LIMIT 1";
		$res = mysqli_query($conn,$select);
		$id = mysqli_fetch_array($res);
		for($i = 0;  $i < count($product); $i++){
			$reciept[] = $id[0];
		}

		for($num=0; $num<count($product); $num++){
			$product_id = mysqli_real_escape_string($conn, $product[$num]);
			$qtyold = mysqli_real_escape_string($conn, $quantity[$num]);

			$sql1 = "SELECT quantity_stock FROM product_details WHERE product_code='$product_id'";
			$result1 = mysqli_query($conn, $sql1);
			$qty = mysqli_fetch_array($result1);

			$newqty = $qty['quantity_stock'] - $qtyold;

			$sql2 = "UPDATE product_details SET quantity_stock= '$newqty' WHERE product_code='$product_id'";
			$result2 = mysqli_query($conn, $sql2);

		}
		for($count = 0; $count < count($product); $count++){
			$price_clean = mysqli_real_escape_string($conn, $price[$count]);
			$reciept_clean = mysqli_real_escape_string($conn, $reciept[$count]);
			$product_clean = mysqli_real_escape_string($conn, $product[$count]);
			$quantity_clean = mysqli_real_escape_string($conn, $quantity[$count]);
			if($product_clean != '' && $quantity_clean != '' && $price_clean != '' && $reciept_clean != ''){
				$query .= "INSERT INTO sales_product(receipt_no,product_code,price,qty) 
					VALUES('{$reciept_clean}','{$product_clean}','{$price_clean}','{$quantity_clean}')";
			}
		} 
	}else{
		echo "failure";
	}

	if ($query != ''){
		if(mysqli_multi_query($conn,$query)){
			echo "success";
		}else{
			echo "failure ari";
		}
	}else{
		echo 'failure dinhi';
	}
}