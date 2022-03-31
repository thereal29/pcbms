<div class="modal fade" id="addProductModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i>   Add New Product</h5>
                </div>
                <form action="index.php?page=add" class="form-horizontal" method="POST">
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
                                    <input type="text" class="form-control" id="prodname" style="text-transform: capitalize;" name="prodname" placeholder="Product Name" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="name">Product Code</label>
                                    <input type="number" class="form-control" id="pcode" style="text-transform: capitalize;" name="pcode" placeholder="Product Code">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="name">Purchase Price (₱)</label>
                                    <input type="number" class="form-control" id="pur_price" style="text-transform: capitalize;" name="pur_price" step="0.01" placeholder="Price" required>
                                </div>
                                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="name">Supplier </label>
                                    <div class="container-select" style="align-items: start; width: 165%;">
                                        <select class='form-control' name='supplierid' required>
                                            <?php 
                                                $sql = mysqli_query($conn, "SELECT * FROM supplier order by supplier_id asc") or die ("Bad SQL: $sql");
                                                echo "<option disable selected hidden value=''>Select Supplier</option>";
                                                while ($row = mysqli_fetch_assoc($sql)) {
                                                    echo "<option value=".$row['supplier_id'].">" . $row['company_name'] ."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="name">Product Unit</label>
                                    <input type="text" class="form-control" id="produnit" style="text-transform: capitalize;" name="produnit" placeholder="Product Unit" required>
                                    <label style="font-size:10px">Please make it in a singular unit(e.g. Piece, Pack, etc.)</label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="name">Purchase Quantity</label>
                                    <input type="number" class="form-control" id="pur_qty" style="text-transform: capitalize;" name="pur_qty" placeholder="Quantiy" required>
                                </div>
                                
                            </div>
                            <div class="form-row" style="justify-content:center;">
                                <div class="form-group col-md-4">
                                    <label class="col-xs-5 control-label" for="hireddate">Expiration Date</label>  
                                    <input type="text" onfocus="(this.type='date')" placeholder="Expiry Date" id="expiredate" name="expiredate" class="form-control" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-xs-4 control-label" for="status">Status</label>
                                    <div class="col-xs-4">
                                        <select name="status" class="form-control input-xs">
                                        <option value="To Deliver" selected>Initial / To Deliver</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        </fieldset>
                    <div class="modal-footer">
                        <button  class="savebtn" name="addProduct">Submit Form</button>
                        <button type="button" class="closebtn" data-bs-dismiss="modal">Close</button>
                    </div>
                    
                </div>
                </form>
        </div>
    </div>
</div>