<?php
  $result = $conn->query("SELECT * FROM `users`, `employee` WHERE `users`.`employee_id` = '".$_SESSION['employee_id']."' AND `employee`.`employee_id` = '".$_SESSION['employee_id']."'");
  $row= mysqli_fetch_array($result, MYSQLI_ASSOC); 
?>  
<div class="sidebar">
    <div class="close-btn">
      <i class="fas fa-times"></i>
    </div>
    <div class="logo_content">
      <div class="logo">
        <div class="logo_name">Store Management
        </div>
      </div>
    </div>
    <div class="menu">
        <div class="item"><a href="./index.php?page=home" class="<?php if($_GET['page'] == 'home'){echo 'current';} ?>"><i class="bx bx-grid-alt"></i>Dashboard</a></div>
        <div class="item"><a href="./index.php?page=employee" class="<?php if($_GET['page'] == 'employee'){echo 'current';} ?>"><i class='fas fa-user-tie'></i></i>Employee</a></div>
        <div class="item"><a href="./index.php?page=customer" class="<?php if($_GET['page'] == 'customer'){echo 'current';} ?>"><i class='fas fa-handshake'></i></i>Customer</a></div>
        <div class="item">
        <a class="sub-btn <?php if(($_GET['page'] == 'prod_quotation') || ($_GET['page'] == 'supplier') || ($_GET['page'] == 'prod_delivery')){echo 'current';} ?>"><i class='bx bxs-store'></i></i>Receive Products<i class="fas fa-angle-right dropdown"></i></a>
        <div class="sub-menu">
          <a href="./index.php?page=supplier" class="<?php if($_GET['page'] == 'supplier'){echo 'current';} ?>">Supplier's Update</a>
          <a href="./index.php?page=prod_quotation" class="<?php if($_GET['page'] == 'prod_quotation'){echo 'current';} ?>">Product Quotation</a>
          <a href="./index.php?page=prod_delivery" class="<?php if($_GET['page'] == 'prod_delivery'){echo 'current';} ?>">Product Delivery</a>
        </div>
      </div>
      <div class="item">
        <a class="sub-btn <?php if(($_GET['page'] == 'prod_code') || ($_GET['page'] == 'prod_purchase') || ($_GET['page'] == 'prod_expired')){echo 'current';} ?>"><i class='fas fa-cart-plus'></i>Order Products<i class="fas fa-angle-right dropdown"></i></a>
        <div class="sub-menu">
          <a href="./index.php?page=prod_purchase" class="<?php if($_GET['page'] == 'prod_purchase'){echo 'current';} ?>">Purchase Order</a>
          <a href="./index.php?page=prod_code" class="<?php if($_GET['page'] == 'prod_code'){echo 'current';} ?>">Barcode Products</a>
          <a href="./index.php?page=prod_expired" class="<?php if($_GET['page'] == 'prod_expired'){echo 'current';} ?>">Expired Products</a>
        </div>
      </div>
      <div class="item"><a href="./index.php?page=inventory" class="<?php if($_GET['page'] == 'inventory'){echo 'current';} ?>"><i class="fas fas fa-book"></i>Inventory</a></div>
      <div class="item"><a href="./index.php?page=sales" class="<?php if($_GET['page'] == 'sales'){echo 'current';} ?>"><i class='bx bx-transfer-alt'></i>Product Sales</a></div>
      <div class="item">
        <a href="./index.php?page=accounts" class="sub-btn <?php if(($_GET['page'] == 'accounts')){echo 'current';} ?>"><i class='bx bxs-user-account'></i>Accounts</i></a>
      </div>
    </div>
    <div class="profile_content">
      <div class="profile">
        <div class="profile_details">
          <img src="assets/img/vsu.png" alt="">
          <div class="name_grade">
            <div class="name ml-2"><?php echo $row['firstname'].""." "."".$row['lastname']?></div>
            <div class="job_role ml-2">Store Manager/Admin</div>
          </div>
        </div>
        <button id="buttons" name="logout" type="button" onclick="out();" class="logout btn btn-danger border mr-2"><i class="bx bx-log-out" id="log_out"></i></button>
      </div>
    </div>
  </div>