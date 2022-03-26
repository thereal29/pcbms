<?php
  $result = $conn->query("SELECT * FROM `users`, `employee` WHERE `users`.`employee_id` = '".$_SESSION['employee_id']."' AND `employee`.`employee_id` = '".$_SESSION['employee_id']."'");
  $row= mysqli_fetch_array($result, MYSQLI_ASSOC); 
?>   

<!-- Top Navigaition for admin and admin -->
  <div class="top_nav">
      <div class="system_name" style="background: #05300e; color: #fff;">      
      <h1 style="margin-inline-start: 0; text-align: left; margin-left:10px;">VSU PCBMS Point of Sales</h1>
      </div>
  </div>
  <div class="profile2">
        <div class="profile_detailss" >
          <!-- <img src="assets/img/vsu.png" alt=""> -->
            <div class="name text-white">CASHIER NAME: <?php echo $row['firstname'].""." "."".$row['lastname']?></div>
        </div>
        <i class="bx bx-log-out" onclick="out();" id="log_out2" style="cursor: pointer;"></i>
    </div>
  <!-- Page -->