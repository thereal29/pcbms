<div class="wrapper">
    <div class="card_b">
        <div class="card-header">
            <strong><i class="bx bx-data"></i>  Product's Code</strong>
        </div>
        <div class="card-body"> 
            <table id="datatableid" class="table table-bordered table-striped " style="width: 100%;">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Product Name</th>
                        <th>Product Code</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="row_data"> 
                    <?php
                        $i = 1;
                        $query = mysqli_query($conn, "SELECT item_id, product_name, product_code FROM product_details pd join product p on p.product_id = pd.product_id") or die(mysqli_error());
                        while($fetch = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <th class="text-center"><?php echo $i++ ?></th>
                        <td style="width: 40%">
                            <?php echo $fetch['product_name'] ?>
                        </td>
                        <td style="width: 30%">
                            <?php echo $fetch['product_code'] ?>
                        </td>
                        <td class="action" style="width: 20%">
                        <?php if($fetch['product_code']==Null){?>
                            <button type="button" id="viewdata" data-bs-toggle="modal" data-bs-target="#updatecode-<?php echo $fetch['item_id']?>"> Insert Code</button>
                        <?php }else{?>
                            <button type="button" id="viewdata" data-bs-toggle="modal" data-bs-target="#updatecode-<?php echo $fetch['item_id']?>"> Edit Code</button>
                        <?php } ?>
                        </td>    
                    </tr>
                    <?php include 'update_code.php' ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>