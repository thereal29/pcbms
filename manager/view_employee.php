<div class="modal fade" id="viewemployee-<?php echo $fetch['employee_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i>   Employee's Profile</h5>
                </div>
                <div class="modal-body">
                    <div class="row col-md-12 mt-4">
                        <div class="col-sm-12" style="width:100%;border-bottom:2px solid #05300e">
                            <h4><b>Employee's Personal Details </b></h4>
                        </div>
                        <div class="col-sm-6">
                        <br>
                            <div class="data font-weight-bold">Name</div>
                            <h6 class="text-muted"><?php echo $fetch['firstname'].""." "."".$fetch['middlename'].""." "."".$fetch['lastname']?></h6>
                        </div>
                        <div class="col-sm-6">
                        <br>
                            <div class="data font-weight-bold">Gender</div>
                            <h6 class="text-muted"><?php echo $fetch['gender']?></h6>
                        </div>
                        <div class="col-sm-6">
                        <br>
                            <div class="data font-weight-bold">Email Address</div>
                            <h6 class="text-muted"><?php echo $fetch['email']?></h6>
                        </div>
                        <div class="col-sm-6">
                        <br>
                            <div class="data font-weight-bold">Phone Number</div>
                            <h6 class="text-muted"><?php echo $fetch['phone_number'] ?></h6>
                        </div>
                        <div class="col-sm-6">
                        <br>
                            <div class="data font-weight-bold">Home Address</div>
                            <h6 class="text-muted"><?php echo  $fetch['province'].", ".$fetch['city'] ?></h6>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button  class="savebtn" data-bs-toggle="modal" data-bs-target="#updateemployee-<?php echo $fetch['employee_id']?>">Update</button>
                        <button type="button" class="closebtn" data-bs-dismiss="modal">Close</button>
                    </div>   
                </div>
        </div>
    </div>
</div>