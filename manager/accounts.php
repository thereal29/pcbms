<div class="wrapper">
    <div class="card_b">
        <div class="card-header">
            <strong><i class="bx bx-data"></i>  Admin's Data</strong>
        </div>
        <div class="card-body">
            <table id="datatableid" class="table table-bordered table-striped " style="width: 100%;">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Username</th>
                        <th>Job Title</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="row_data"> 
                    <?php
                        $i = 1;
                        $query = mysqli_query($conn, "SELECT user_id, firstname, lastname, middlename,gender, username, e.employee_id,password, t.type, j.job_title, email, phone_number, hired_date, l.province, l.city
                        FROM users u
                        JOIN employee e ON e.employee_id= u.employee_id
                        JOIN location l on e.location_id = l.location_id
                        JOIN type t ON t.type_id=u.type_id
                        JOIN job j ON j.job_id=e.job_id
                        WHERE u.type_id=1") or die(mysqli_error());
                        while($fetch = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <th class="text-center"><?php echo $i++ ?></th>
                        <td style="width: 35%">
                        <?php echo $fetch['lastname'].', '.$fetch['firstname'].' '.$fetch['middlename'] ?>
                        </td>
                        <td style="width: 15%">
                            <?php echo $fetch['gender'] ?>      
                        </td>
                        <td style="width: 20%">
                            <?php echo $fetch['username']?>        
                        </td>
                        <td style="width: 15%">
                            <?php echo $fetch['job_title']?>  
                        </td>  
                        <td class="action">
                        <button type="button" id="purprod1" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewuser-<?php echo $fetch['user_id'] ?>">View</button>
                        <button type="button" id="purprod1" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteuser-<?php echo $fetch['user_id'] ?>"><i class="fa fa-trash"></i></button>
                        </td>   
                    </tr>
                    <?php include 'view_account.php'?>
                    <?php include 'update_account.php'?>
                    <?php include 'delete_account.php'?>
                </tbody>
                <?php }?>
            </table>
        </div>
    </div>
    <div class="card_b">
        <div class="card-header">
            <strong><i class="bx bx-data"></i>  User's Data</strong>
        </div>
        <div class="card-body">
            <table id="datatableid2" class="table table-bordered table-striped " style="width: 100%;">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Username</th>
                        <th>Job Title</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="row_data">  
                <?php
                        $i = 1;
                        $query = mysqli_query($conn, "SELECT user_id, firstname, lastname, middlename,gender, username, e.employee_id, password, t.type, j.job_title, email, phone_number, hired_date, l.province, l.city
                        FROM users u
                        JOIN employee e ON e.employee_id= u.employee_id
                        JOIN location l on e.location_id = l.location_id
                        JOIN type t ON t.type_id=u.type_id
                        JOIN job j ON j.job_id=e.job_id
                        WHERE u.type_id=2") or die(mysqli_error());
                        while($fetch = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <th class="text-center"><?php echo $i++ ?></th>
                        <td style="width: 35%">
                        <?php echo $fetch['lastname'].', '.$fetch['firstname'].' '.$fetch['middlename'] ?>
                        </td>
                        <td style="width: 15%">
                            <?php echo $fetch['gender'] ?>      
                        </td>
                        <td style="width: 20%">
                            <?php echo $fetch['username']?>        
                        </td>
                        <td style="width: 15%">
                            <?php echo $fetch['job_title']?>  
                        </td>
                        <td class="action">
                        <button type="button" id="purprod1" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewuser-<?php echo $fetch['user_id'] ?>">View</button>
                        <button type="button" id="purprod1" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteuser-<?php echo $fetch['user_id'] ?>"><i class="fa fa-trash"></i></button>
                        </td>   
                    </tr>
                    <?php include 'view_account.php'?>
                    <?php include 'update_account.php'?>
                    <?php include 'delete_account.php'?>
                </tbody>
                <?php }?>
            </table>
        </div>
    </div>
</div>