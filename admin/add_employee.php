<div class="modal fade" id="addEmployeeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i>   Add New Employee</h5>
                </div>
                <form action="index.php?page=add" class="form-horizontal" method="POST">
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
                                    <input type="text" class="form-control" id="firstname" style="text-transform: capitalize;" name="firstname" placeholder="First Name" required>
                                    <label style="font-size:10px">(First name)</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="middlename" style="text-transform: capitalize;" name="middlename" placeholder="Middle Name" required>
                                    <label style="font-size:10px">(Middle name)</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="lastname" style="text-transform: capitalize;" name="lastname" placeholder="Last Name" required>
                                    <label style="font-size:10px">(Last name)</label>
                                </div> 
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="col-xs-4 control-label" for="gender">Gender</label>
                                    <div class="col-xs-4">
                                        <select id="gender" name="gender" class="form-control input-xs" required>
                                        <option disabled selected hidden value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-xs-4 control-label" for="jobs">Job Title</label>
                                    <div class="col-xs-4">
                                        <select class='form-control' name='jobs' required>
                                            <?php
                                                $sql = "SELECT DISTINCT job_title, job_id FROM job order by job_id asc";
                                                $result = mysqli_query($conn, $sql) or die ("Bad SQL: $sql");
                                                echo "<option disable selected hidden value=''>Select Job</option>";
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='".$row['job_id']."'>".$row['job_title']."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-xs-5 control-label" for="hireddate">Hired Date</label>  
                                    <input type="date" id="FromDate" name="hireddate" value="yyyy-MM-dd" class="form-control" required="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="col-sx-4 control-label" for="email_address ">Email</label>
                                    <input id="email_address" name="email_address" type="email" placeholder="Email Address" class="form-control input-xs" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-xs-5 control-label" for="phonenumber">Phone Number</label>  
                                    <input id="phonenumber" class="form-control" name="phonenumber" placeholder="Phone Number" type="tel" pattern="[0-9]{11}" required="">
                                    <label style="font-size:10px">(11 Digits only)</label>
                                </div>
                            </div>
                            <label class="control-label" for="name">Location/Home Address</label>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <select class="form-control" id="province" placeholder="Province" name="province" required></select>
                                <label style="font-size:10px">(Province)</label>
                                </div>
                                <div class="form-group col-md-4">
                                <select class="form-control" id="city" placeholder="City" name="city" required></select>
                                <label style="font-size:10px">(City/Municipality)</label>
                                </div>
                                </div> 
                            </div>
                        </div>
                        <br>
                        </fieldset>
                    <div class="modal-footer">
                        <button  class="savebtn" name="addEmployee">Submit Form</button>
                        <button type="button" class="closebtn" data-bs-dismiss="modal">Close</button>
                    </div>
                    
                </div>
                </form>
        </div>
    </div>
</div>