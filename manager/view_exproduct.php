<div class="modal fade" id="viewexproduct-<?php echo $fetch['item_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i>   Products' Details</h5>
                </div>
                <div class="modal-body">
                    <div class="row col-md-12 mt-4">
                        <div class="col-sm-12" style="width:100%;border-bottom:2px solid #05300e">
                            <h4><b>Expired Products' Details </b></h4>
                        </div>
                        <div class="col-sm-6">
                        <br>
                            <div class="data font-weight-bold">Product Name</div>
                            <h6 class="text-muted"><?php echo $fetch['product_name']?></h6>
                        </div>
                        <div class="col-sm-6">
                        <br>
                            <div class="data font-weight-bold">Supplier Name</div>
                            <h6 class="text-muted"><?php echo $fetch['company_name']?></h6>
                        </div>
                        <div class="col-sm-6">
                        <br>
                            <div class="data font-weight-bold">Date Stock In</div>
                            <h6 class="text-muted"><?php echo $fetch['date_stock_in']?></h6>
                        </div>
                        <div class="col-sm-6">
                        <br>
                            <div class="data font-weight-bold">Expiration Date</div>
                            <h6 class="text-muted"><?php echo $fetch['expiry_date'] ?></h6>
                        </div>
                        <div class="col-sm-6">
                        <br>
                            <div class="data font-weight-bold">Purchase Price</div>
                            <h6 class="text-muted"><?php echo  $fetch['purchase_unit_price']?></h6>
                        </div>
                        <div class="col-sm-6">
                        <br>
                        <?php 
                        if( $fetch['quantity_stock'] > 1)
                        { $s='s';
                        }else{ $s='';} ?>
                            <div class="data font-weight-bold">Product Quantity*Unit</div>
                            <h6 class="text-muted"><?php echo $fetch['quantity_stock'].' '.$fetch['unit'].''.$s ?></h6>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="closebtn" data-bs-dismiss="modal">Close</button>
                    </div>   
                </div>
        </div>
    </div>
</div>