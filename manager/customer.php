<div class="wrapper">
    <div class="card_b">
        <div class="card-header">
            <strong><i class="bx bx-data"></i>  Customer's Data</strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="card-title float-left">List of Customers</h5>
                    <button type="button" class="float-right" id="newdata" data-bs-toggle="modal" data-bs-target="#addCustomerModal"><i class="fa fa-plus"></i> New Customer</button>
                    </div>
            </div>  
            <table id="datatableid" class="table table-bordered table-striped " style="width: 100%;">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="row_data">  
                    <?php
                        $i = 1;
                        $query = mysqli_query($conn, "SELECT * FROM customer ORDER BY lastname") or die(mysqli_error());
                        while($fetch = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <th class="text-center"><?php echo $i++ ?></th>
                        <td style="width: 20%">
                        <?php echo $fetch['firstname'] ?>
                        </td>
                        <td style="width: 20%">
                            <?php echo $fetch['lastname'] ?>      
                        </td>
                        <td style="width: 35%">
                            <?php echo $fetch['phone_number']?>        
                        </td>
                        <td class="action" style="width: 20%">
                        <button type="button" id="viewdata" data-bs-toggle="modal" data-bs-target="#updatecustomer-<?php echo $fetch['cust_id']?>"> Edit Profile</button>
                        </td>    
                    </tr>
                    <?php include 'update_customer.php' ?>
                        <?php } ?>
                        <?php  include 'add_customer.php' ?>
                </tbody>
            </table>
        </div>
    </div>
</div>