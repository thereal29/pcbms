<div class="wrapper">
    <div class="card_b">
        <div class="card-header">
            <strong><i class="bx bx-data"></i>  Supplier's Data</strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="card-title float-left">List of Suppliers</h5>
                    <button type="button" class="float-right" id="newdata" data-bs-toggle="modal" data-bs-target="#addSupplierModal"><i class="fa fa-plus"></i> New Supplier</button>
                    </div>
            </div>  
            <table id="datatableid" class="table table-bordered table-striped " style="width: 100%;">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Company Name</th>
                        <th>Province</th>
                        <th>City</th>
                        <th>Phone Number</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="row_data">
                    <?php
                        $i = 1;
                        $query = mysqli_query($conn, "SELECT supplier_id, company_name, phone_number, l.province, l.city FROM supplier s join location l on s.location_id = l.location_id ORDER BY company_name") or die(mysqli_error());
                        while($fetch = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <th class="text-center"><?php echo $i++ ?></th>
                        <td style="width: 35%">
                        <?php echo $fetch['company_name'] ?>
                        </td>
                        <td style="width: 15%">
                            <?php echo $fetch['province']?>      
                        </td>
                        <td style="width: 15%">
                            <?php echo $fetch['city']?>        
                        </td>
                        <td style="width: 20%">
                            <?php echo $fetch['phone_number']?>        
                        </td>
                        <td class="action" style="width: 20%">
                        <button type="button" id="viewdata" data-bs-toggle="modal" data-bs-target="#updatesupplier-<?php echo $fetch['supplier_id']?>"> Edit </button>
                        </td>    
                    </tr>
                    <?php include 'update_supplier.php' ?>
                        <?php } ?>
                        <?php  include 'add_supplier.php' ?>
                </tbody>
            </table>
        </div>
    </div>
</div>