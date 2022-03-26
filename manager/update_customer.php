<div class="modal fade" id="updatecustomer-<?php echo $fetch['cust_id']?>" style="overflow-y: scroll" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i>   Update Customer's Profile</h5>
            </div>
            <form action="index.php?page=update" class="form-horizontal" method="POST">
                <input type="hidden" name="id" value="<?php echo $fetch['cust_id']; ?>" />
                    <div class="modal-body">
                        <fieldset>
                        <div class="col-md-12">
                            <div class="form-group" style="width:100%;border-bottom:2px solid #05300e">
                                <h4><b>Customer's Personal Details </b></h4>
                            </div>
                            <br>
                          
                            <label class="control-label" for="name">Name</label>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="firstname" style="text-transform: capitalize;" name="firstname" placeholder="First Name" value="<?php echo $fetch['firstname']?>" required>
                                    <label style="font-size:10px">(First name)</label>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="lastname" style="text-transform: capitalize;" name="lastname" placeholder="Last Name" value="<?php echo $fetch['lastname']?>" required>
                                    <label style="font-size:10px">(Last name)</label>
                                </div> 
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label class="col-xs-5 control-label" for="phonenumber">Phone Number</label>  
                                    <input id="phonenumber" class="form-control" name="phonenumber" placeholder="Phone Number" type="tel" pattern="[0-9]{11}" value="<?php echo $fetch['phone_number']?>" required="">
                                    <label style="font-size:10px">(11 Digits only)</label>
                                </div>
                                
                            </div>
                        </div>
                        <br>
                        </fieldset>
                    <div class="modal-footer">
                        <button  class="savebtn" name="updateCustomer">Submit Form</button>
                        <button type="button" class="closebtn" data-bs-dismiss="modal">Close</button>
                    </div> 
                </div>
            </form>
        </div>
    </div>
</div>