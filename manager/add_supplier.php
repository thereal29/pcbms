<div class="modal fade" id="addSupplierModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i>   Add New Supplier</h5>
                </div>
                <form action="index.php?page=add" class="form-horizontal" method="POST">
                    <div class="modal-body">
                        <fieldset>
                        <div class="col-md-12">
                            <div class="form-group" style="width:100%;border-bottom:2px solid #05300e">
                                <h4><b>Supplier's Details </b></h4>
                            </div>
                            <br>
                            <label class="control-label" for="name">Company Name</label>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control" id="compname" style="text-transform: capitalize;" name="compname" placeholder="Company Name" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label class="col-xs-5 control-label" for="phonenumber">Phone Number</label>  
                                    <input id="phonenumber" class="form-control" name="phonenumber" placeholder="Phone Number" type="tel" pattern="[0-9]{11}" required="">
                                    <label style="font-size:10px">(11 Digits only)</label>
                                </div>
                            </div>
                            <label class="control-label" for="name">Location/Home Address</label>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <select class="form-control" id="province" placeholder="Province" name="province" required></select>
                                <label style="font-size:10px">(Province)</label>
                                </div>
                                <div class="form-group col-md-6">
                                <select class="form-control" id="city" placeholder="City" name="city" required></select>
                                <label style="font-size:10px">(City/Municipality)</label>
                                </div>
                                </div> 
                            </div>
                        </div>
                        <br>
                        </fieldset>
                    <div class="modal-footer">
                        <button  class="savebtn" name="addSupplier">Submit Form</button>
                        <button type="button" class="closebtn" data-bs-dismiss="modal">Close</button>
                    </div>
                    
                </div>
                </form>
        </div>
    </div>
</div>