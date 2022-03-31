
<div class="wrapper">
    <div class="card_b">
        <div class="card-header">
            <strong><i class="bx bx-data"></i>  Products's Data</strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="card-title float-left">List of Purchased Products</h5>
                    <button type="button" class="float-right" id="newdata" data-bs-toggle="modal" data-bs-target="#addProductModal"><i class="fa fa-plus"></i> New Products</button>
                    </div>
            </div>  
            <table id="datatableid" class="table table-bordered table-striped " style="width: 100%;">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Product Name</th>
                        <th>Delivery Code</th>
                        <th>Purchase Price</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="row_data">  
                <?php
                        $i = 1;
                        $query = mysqli_query($conn, "SELECT item_id, pd.d_code, p.product_code, prod.product_name, prod.unit, purchase_unit_price, expiry_date, quantity_stock, s.company_name, pd.del_date, p.date_stock_in, pd.status, pd.supplier_id FROM product_details p join product_delivery pd on pd.d_code = p.d_code join supplier s on s.supplier_id=pd.supplier_id join product prod on prod.product_id=p.product_id group by item_id ORDER BY product_name") or die(mysqli_error());
                        while($fetch = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <th class="text-center"><?php echo $i++ ?></th>
                        <td style="width: 30%">
                        <?php echo $fetch['product_name'] ?>
                        </td>
                        <td style="width: 15%">
                            <?php echo $fetch['d_code']?>      
                        </td>
                        <td style="width: 15%">
                        ₱<?php echo $fetch['purchase_unit_price']?>        
                        </td>
                        <td style="width: 15%">
                            <?php echo $fetch['status']?>        
                        </td>
                        <td class="action" style="width: 20%">
                        <button type="button" id="purprod1" data-bs-toggle="modal" data-bs-target="#viewproduct-<?php echo $fetch['item_id']?>">Edit Product</button>
                        <?php 
                        if($fetch['status'] == "Delivered"){
                            
                        }
                        else{
                          if(!empty($fetch['product_code'])){
                                echo '<button type="button" id="purprod2" data-bs-toggle="modal" data-bs-target="#changestat-'.$fetch['item_id'].'">Change Status</button>';
                            }else{
                                echo '<button type="button" id="purprod2" onclick="error_code()"">Change Status</button>';
                            }
                            
                        }
                        ?>
                        </td>    
                    </tr>
                    <?php include 'update_status.php' ?>
                    <?php include 'update_purchase.php' ?>
                    
                        <?php } ?>
                        <?php  include 'add_product.php' ?>
                </tbody>
            </table>
        </div>
    </div>
</div>