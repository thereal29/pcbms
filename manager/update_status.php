<div class="modal fade" id="changestat-<?php echo $fetch['item_id']?>" style="overflow-y: scroll" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-truck"></i>  Change Delivery Status</h5>
            </div>
            <form action="index.php?page=update" class="form-horizontal" method="POST">
                <input type="hidden" name="id" value="<?php echo $fetch['item_id']; ?>" />
                <input type="hidden" name="status" value="<?php echo $fetch['status']; ?>" />
                    <div class="modal-body">
                        <?php 
                        if($fetch['status']=="To Deliver")
                        {
                         echo '<span>Are you sure to change <strong>Delivery Status</strong> into <strong>On Delivery</strong>?</span>';
                        }
                        if($fetch['status']=="On Delivery")
                        {
                         echo '<span>Are you sure to change <strong>Delivery Status</strong> into <strong>Delivered</strong>?</span>';
                        }
                        ?>
                    <div class="modal-footer">
                        <button  class="savebtn" name="changeDelStat">Yes</button>
                        <button type="button" class="closebtn" data-bs-dismiss="modal">No</button>
                    </div> 
                </div>
            </form>
        </div>
    </div>
</div>