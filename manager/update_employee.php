<div class="modal fade" id="updateemployee-<?php echo $fetch['employee_id']?>" style="overflow-y: scroll" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i>   Update Employee's Profile</h5>
            </div>
            <form action="index.php?page=update" class="form-horizontal" method="POST">
                <input type="hidden" name="id" value="<?php echo $fetch['employee_id']; ?>" />
                    <div class="modal-body">
                        <fieldset>
                        <div class="col-md-12">
                            <div class="form-group" style="width:100%;border-bottom:2px solid #05300e">
                                <h4><b>Employee's Personal Details </b></h4>
                            </div>
                            <br>
                          
                            <label class="control-label" for="name">Name</label>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="firstname" style="text-transform: capitalize;" name="firstname" placeholder="First Name" value="<?php echo $fetch['firstname']?>" required>
                                    <label style="font-size:10px">(First name)</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="middlename" style="text-transform: capitalize;" name="middlename" placeholder="Middle Name" value="<?php echo $fetch['middlename']?>" required>
                                    <label style="font-size:10px">(Middle name)</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="lastname" style="text-transform: capitalize;" name="lastname" placeholder="Last Name" value="<?php echo $fetch['lastname']?>" required>
                                    <label style="font-size:10px">(Last name)</label>
                                </div> 
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="col-xs-4 control-label" for="gender">Gender</label>
                                    <div class="col-xs-4">
                                        <select id="gender" name="gender" class="form-control input-xs">
                                        <option><?php echo $fetch['gender']?></option>
                                        <?php if($fetch['gender']=='Male'){
                                            echo '<option>Female</option>';

                                        }
                                        else{
                                            echo '<option>Male</option>';
                                        }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-xs-4 control-label" for="jobs">Job Title</label>
                                    <div class="col-xs-4">
                                        <select class='form-control' name='jobs'>
                                            <?php
                                                $sql = "SELECT DISTINCT job_title, job_id FROM job order by job_id asc";
                                                $result = mysqli_query($conn, $sql) or die ("Bad SQL: $sql");
                                                echo "<option disable selected hidden value=".$fetch['job_id'].">".$fetch['job_title']."</option>";
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='".$row['job_id']."'>".$row['job_title']."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-xs-5 control-label" for="hireddate">Hired Date</label>  
                                    <input type="date" id="FromDate" name="hireddate" class="form-control" value="<?php echo $fetch['hired_date']?>" required="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="col-sx-4 control-label" for="email_address ">Email</label>
                                    <input id="email_address" name="email_address" type="email" placeholder="Email Address" class="form-control input-xs" value="<?php echo $fetch['email']?>" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-xs-5 control-label" for="phonenumber">Phone Number</label>  
                                    <input id="phonenumber" class="form-control" name="phonenumber" placeholder="Phone Number" type="tel" pattern="[0-9]{11}" value="<?php echo $fetch['phone_number']?>" required="">
                                    <label style="font-size:10px">(11 Digits only)</label>
                                </div>
                                
                            </div>
                            <label class="control-label" for="name">Location/Home Address</label>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <input class="form-control" id="province1" placeholder="Province" name="province" value="<?php echo $fetch['province']?>" required></input>

                                <label style="font-size:10px">(Province)</label>
                                </div>
                                <div class="form-group col-md-4">
                                <input class="form-control" id="city1" placeholder="City" name="city" value="<?php echo $fetch['city']?>" required></input>
                                <label style="font-size:10px">(City/Municipality)</label>
                                </div>
                                </div> 
                            </div>
                        </div>
                        <br>
                        </fieldset>
                    <div class="modal-footer">
                        <button  class="savebtn" name="updateEmployee">Submit Form</button>
                        <button type="button" class="closebtn" data-bs-dismiss="modal">Close</button>
                    </div> 
                </div>
            </form>
        </div>
    </div>
</div>