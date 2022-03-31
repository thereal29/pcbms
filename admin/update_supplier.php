<div class="modal fade" id="updatesupplier-<?php echo $fetch['supplier_id']?>" style="overflow-y: scroll" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i>   Update Supplier's Profile</h5>
            </div>
            <form action="index.php?page=update" class="form-horizontal" method="POST">
                <input type="hidden" name="id" value="<?php echo $fetch['supplier_id']; ?>" />
                    <div class="modal-body">
                        <fieldset>
                        <div class="col-md-12">
                            <div class="form-group" style="width:100%;border-bottom:2px solid #05300e">
                                <h4><b>Supplier's Details </b></h4>
                            </div>
                            <br>
                            <label class="control-label" for="name">Company Name</label>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" id="compname" style="text-transform: capitalize;" name="compname" value="<?php echo $fetch['company_name']?>" placeholder="Company Name" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="col-xs-5 control-label" for="phonenumber">Phone Number</label>  
                                    <input id="phonenumber" class="form-control" name="phonenumber" placeholder="Phone Number" type="tel" value="<?php echo $fetch['phone_number']?>" pattern="[0-9]{11}" required="">
                                    <label style="font-size:10px">(11 Digits only)</label>
                                </div>
                            </div>
                            <label class="control-label" for="name">Location/Home Address</label>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                <input class="form-control" id="province1" placeholder="Province" name="province" value="<?php echo $fetch['province']?>" required></input>

                                <label style="font-size:10px">(Province)</label>
                                </div>
                                <div class="form-group col-md-8">
                                <input class="form-control" id="city1" placeholder="City" name="city" value="<?php echo $fetch['city']?>" required></input>
                                <label style="font-size:10px">(City/Municipality)</label>
                                </div>
                                </div> 
                            </div>
                        </div>
                        <br>
                        </fieldset>
                    <div class="modal-footer">
                        <button  class="savebtn" name="updateSupplier">Submit Form</button>
                        <button type="button" class="closebtn" data-bs-dismiss="modal">Close</button>
                    </div> 
                </div>
            </form>
        </div>
    </div>
</div>