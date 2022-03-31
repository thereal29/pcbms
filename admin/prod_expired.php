<div class="wrapper">
    <div class="card_b">
        <div class="card-header">
            <strong><i class="bx bx-data"></i>  Products's Data</strong>
        </div>
        <div class="card-body"> 
            <table id="datatableid" class="table table-bordered table-striped " style="width: 100%;">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Product Name</th>
                        <th>Purchase Price</th>
                        <th>Unit</th>
                        <th>Date Expired</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="row_data">  
                <?php
                        $i = 1;
                        $query = mysqli_query($conn, "SELECT item_id, prod.product_name, p.date_stock_in, pd.supplier_id,s.company_name, p.quantity_stock, prod.unit, purchase_unit_price, expiry_date FROM product_details p join product_delivery pd on pd.d_code = p.d_code join supplier s on s.supplier_id=pd.supplier_id join product prod on prod.product_id=p.product_id and p.expiry_date < NOW()  group by item_id ORDER BY product_name") or die(mysqli_error());
                        while($fetch = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <th class="text-center"><?php echo $i++ ?></th>
                        <td style="width: 35%">
                        <?php echo $fetch['product_name'] ?>
                        </td>
                        <td style="width: 10%">
                        ₱<?php echo $fetch['purchase_unit_price']?>        
                        </td>
                        <td style="width: 15%">
                            <?php echo $fetch['unit']?>        
                        </td>
                        <td style="width: 15%">
                            <?php echo $fetch['expiry_date'] ?>        
                        </td>
                        <td class="action" style="width: 20%">
                        <button type="button" id="viewdata" data-bs-toggle="modal" data-bs-target="#viewexproduct-<?php echo $fetch['item_id']?>"> View Product</button>
                        </td>    
                    </tr>
                    <?php include 'view_exproduct.php'?>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>