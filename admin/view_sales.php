<div class="modal fade" id="viewsales-<?php echo $fetch['receipt_no']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-handshake"></i>  Sales' Details</h5>
                </div>
                <div class="modal-body">
                    <div class="row col-md-12 mt-0">
                        <div class="col-sm-6">
                            <div class="data font-weight-bold">Product Name</div>
                            <h6 class="text-muted"><?php echo $fetch['product_name']?></h6>
                        </div>
                        <div class="col-sm-6">
                            <div class="data font-weight-bold">Product Code</div>
                            <h6 class="text-muted"><?php echo $fetch['product_code']?></h6>
                        </div>
                        <div class="col-sm-6">
                        <br>
                            <div class="data font-weight-bold">Customer Name</div>
                            <h6 class="text-muted"><?php echo $fetch['c_firstname'].', '.$fetch['c_lastname']?></h6>
                        </div>
                        <div class="col-sm-6">
                        <br>
                            <div class="data font-weight-bold">Cashier Name</div>
                            <h6 class="text-muted"><?php echo $fetch['e_firstname'].', '.$fetch['e_lastname'] ?></h6>
                        </div>
                        <div class="col-sm-6">
                        <br>
                            <div class="data font-weight-bold">Product Price</div>
                            <h6 class="text-muted">₱ <?php echo  $fetch['price']?></h6>
                        <br>
                        </div>
                        <div class="col-sm-6">
                        <br>
                        <?php 
                        if( $fetch['qty'] > 1)
                        { $s='s';
                        }else{ $s='';} ?>
                            <div class="data font-weight-bold">Product Quantity*Unit</div>
                            <h6 class="text-muted"><?php echo $fetch['qty'].' '.$fetch['unit'].''.$s ?></h6>
                        <br>
                        </div>
                        <div class="col-sm-12" style="width:100%;border-bottom:2px solid #05300e">
                        </div>
                        <?php 
                        $Undiscounted = $fetch['qty'] * $fetch['price'];
                        ?>
                        <div class="col-sm-4">
                        <br>
                            <div class="data font-weight-bold">Undiscounted Total</div>
                            <h6 class="text-muted">₱<?php echo  $Undiscounted?></h6>
                        </div>
                        <div class="col-sm-4">
                        <br>
                            <div class="data font-weight-bold">Discount %</div>
                            <h6 class="text-muted"><?php echo  $fetch['discount']?> %</h6>
                        </div>
                        <div class="col-sm-4">
                        <br>
                            <div class="data font-weight-bold">Grand Total</div>
                            <h6 style="color: red; font-weight:bold">₱ <?php echo  $fetch['total']?></h6>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="closebtn" data-bs-dismiss="modal">Close</button>
                    </div>   
                </div>
        </div>
    </div>
</div>