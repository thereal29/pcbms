<div class="modal fade" id="viewproduct-<?php echo $fetch['item_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="prodname">Product Name</label>
                                    <input type="text" class="form-control" id="prodname" style="text-transform: capitalize;" name="prodname" value="<?php echo $fetch['product_name']?>" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="name">Product Code</label>
                                    <input type="number" class="form-control" id="pcode" style="text-transform: capitalize;" name="pcode" value="<?php echo $fetch['product_code']?>" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="name">Purchase Price (₱)</label>
                                    <input type="number" class="form-control" id="pur_price" style="text-transform: capitalize;" step="0.01" name="pur_price" value="<?php echo $fetch['purchase_unit_price']?>" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="name">Supplier </label>
                                    <div class="container-select" style="align-items: start; width: 165%;">
                                        <select class='form-control' name='supplierid' required>
                                            <?php 
                                                $sql = mysqli_query($conn, "SELECT * FROM supplier order by supplier_id asc") or die ("Bad SQL: $sql");
                                                echo "<option disable selected hidden value=".$fetch['supplier_id'].">" . $fetch['company_name'] ."</option>";
                                                while ($row = mysqli_fetch_assoc($sql)) {
                                                    echo "<option value=".$row['supplier_id'].">" . $row['company_name'] ."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="name">Purchase Quantity</label>
                                    <input type="number" class="form-control" id="pur_qty" style="text-transform: capitalize;" name="pur_qty" value="<?php echo $fetch['quantity_stock']?>" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="name">Product Unit</label>
                                    <input type="text" class="form-control" id="produnit" style="text-transform: capitalize;" name="produnit" value="<?php echo $fetch['unit']?>" required>
                                    <label style="font-size:10px">Please make it in a singular unit(e.g. Piece, Pack, etc.)</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="col-xs-5 control-label" for="hireddate">Expiration Date</label>  
                                    <input type="date" id="expiredate" name="expiredate" class="form-control" value="<?php echo $fetch['expiry_date']?>" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        </fieldset>
                    <div class="modal-footer">
                        <button  class="savebtn" name="updateProduct">Submit Form</button>
                        <button type="button" class="closebtn" data-bs-dismiss="modal">Close</button>
                    </div>
                    
                </div>
                </form>
        </div>
    </div>
</div>