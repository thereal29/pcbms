<?php
include '../database/DBController.php';

	if (isset($_POST['products'])){

		$name = mysqli_real_escape_string($conn,$_POST['products']);
		$show 	= "SELECT item_id, p.product_code, prod.product_name, prod.unit, selling_unit_price, quantity_stock FROM product_details p join product prod on prod.product_id=p.product_id and product_name LIKE '$name%' AND quantity_stock > 0 or product_code LIKE '$name%' AND quantity_stock > 0 group by item_id";
		$query 	= mysqli_query($conn,$show);
		if(mysqli_num_rows($query)>0){
			while($row = mysqli_fetch_array($query)){
				echo "<tr class='js-add text-center' data-barcode=".$row['product_code']." data-product=".$row['product_name']." data-price=".$row['selling_unit_price']." data-unit=".$row['unit']." data-qty=".$row['quantity_stock']."><td>".$row['product_code']."</td><td>".$row['product_name']."</td>";
				echo "<td>₱".$row['selling_unit_price']."</td>";
				echo "<td>".$row['unit']."</td>";
				echo "<td>".$row['quantity_stock']."</td>";
			}
		}

	}?>