<div class="modal fade" id="viewprodquotation-<?php echo $fetch['item_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i>   Edit Product</h5>
                </div>
                <form action="index.php?page=update" class="form-horizontal" method="POST">
                <input type="hidden" name="id" value="<?php echo $fetch['item_id']; ?>" />
                    <div class="modal-body">
                        <fieldset>
                        <div class="col-md-12">
                            <div class="form-group" style="width:100%;border-bottom:2px solid #05300e">
                                <h4><b>Product Details </b></h4>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="prodname">Product Name</label>
                                    <input type="text" class="form-control" id="prodname" style="text-transform: capitalize;" name="prodname" value="<?php echo $fetch['product_name']?>" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="name">Selling Price (₱)</label>
                                    <input type="number" class="form-control" id="sell_price" style="text-transform: capitalize;" step="0.01" name="sell_price" value="<?php echo $fetch['selling_unit_price']?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="name">Product Unit</label>
                                    <input type="text" class="form-control" id="produnit" style="text-transform: capitalize;" name="produnit" value="<?php echo $fetch['unit']?>" required>
                                    <label style="font-size:10px">Please make it in a singular unit(e.g. Piece, Pack, etc.)</label>
                                </div>
                            </div>
                            </div>
                        </div>
                        <br>
                        </fieldset>
                    <div class="modal-footer">
                        <button  class="savebtn" name="updateQuotation">Submit Form</button>
                        <button type="button" class="closebtn" data-bs-dismiss="modal">Close</button>
                    </div>
                    
                </div>
                </form>
        </div>
    </div>
</div>