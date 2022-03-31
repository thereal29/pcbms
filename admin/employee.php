<div class="wrapper">
    <div class="card_b">
        <div class="card-header">
            <strong><i class="bx bx-data"></i>  Employee's Data</strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="card-title float-left">List of Employees</h5>
                    <button type="button" class="float-right" id="newdata" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i class="fa fa-plus"></i> New Employee</button>
                    </div>
            </div>  
            <table id="datatableid" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Job</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="row_data">  
                    <?php
                        $i = 1;
                        $query = mysqli_query($conn, "SELECT employee_id, firstname, lastname, middlename,gender, email, phone_number, j.job_title, hired_date, l.province, l.city FROM employee e join location l on e.location_id = l.location_id join job j on j.job_id=e.job_id ORDER BY lastname") or die(mysqli_error());
                        while($fetch = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <th class="text-center"><?php echo $i++ ?></th>
                        <td style="width: 35%">
                        <?php echo $fetch['lastname'] . ', ' . $fetch['firstname']. ' ' . $fetch['middlename'] ?>
                        </td>
                        <td style="width: 10%">
                            <?php echo $fetch['gender']?>      
                        </td>
                        <td style="width: 30%">
                            <?php echo $fetch['email']?>        
                        </td>
                        <td style="width: 15%">
                            <?php echo $fetch['job_title']?>        
                        </td>
                        <td class="action" style="width: 20%">
                        <button type="button" id="viewdata" data-bs-toggle="modal" data-bs-target="#viewemployee-<?php echo $fetch['employee_id']?>"> View Profile</button>
                        </td>    
                    </tr>
                    <?php include 'view_employee.php' ?>
                    <?php include 'update_employee.php' ?>
                        <?php } ?>
                        <?php  include 'add_employee.php' ?>
                </tbody>
            </table>
        </div>
    </div>
</div>