<div class="wrapper">
    <div class="card_b">
        <div class="card-header">
            <strong><i class="bx bx-data"></i>  Store Inventory</strong>
        </div>
        <div class="card-body"> 
            <table id="datatableid" class="table table-bordered table-striped " style="width: 100%;">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Supplier</th>
                        <th>Stock Quantity</th>
                        <th>Selling Price</th>
                        <th>Date of Stock</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="row_data">  
                <?php
                        $i = 1;
                        $query = mysqli_query($conn, "SELECT item_id, pd.d_code, p.product_code, prod.product_name, prod.unit, selling_unit_price, expiry_date, quantity_stock, s.company_name, pd.del_date, p.date_stock_in, pd.status, pd.supplier_id FROM product_details p join product_delivery pd on pd.d_code = p.d_code join supplier s on s.supplier_id=pd.supplier_id join product prod on prod.product_id=p.product_id where pd.status = 'Delivered' group by item_id") or die(mysqli_error());
                        while($fetch = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <th class="text-center"><?php echo $i++ ?></th>
                        <td style="width: 15%">
                        <?php echo $fetch['product_code'] ?>
                        </td>
                        <td style="width: 20%">
                            <?php echo $fetch['product_name']?>      
                        </td>
                        <td style="width: 20%">
                            <?php echo $fetch['company_name']?>      
                        </td>
                        <td style="width: 10%">
                        <?php echo $fetch['quantity_stock']?>        
                        </td>
                        <td style="width: 10%">
                        ₱<?php echo $fetch['selling_unit_price']?>        
                        </td>
                        <td style="width: 15%">
                            <?php echo $fetch['date_stock_in']?>        
                        </td>
                        <td class="action" style="width: 20%">
                        <button type="button" id="viewdata" data-bs-toggle="modal" data-bs-target="#viewprodinventory-<?php echo $fetch['item_id']?>">Edit Product</button>
                    </tr>
                    <?php include 'update_inventory.php' ?>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>