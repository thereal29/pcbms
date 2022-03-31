<div class="wrapper">
    <div class="card_b">
        <div class="card-header">
            <strong><i class="bx bx-data"></i>  Daily Time Record</strong>
        </div>
        <div class="card-body">
            <table id="datatableid" class="table table-bordered table-striped " style="width: 100%;">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Username</th>
                        <th>Log In/Out</th>
                        <th>Date & Time</th>
                    </tr>
                </thead>
                <tbody id="row_data">  
                    <?php
                        $i = 1;
                        $query = mysqli_query($conn, "SELECT * FROM dtr ORDER BY dtr_id DESC") or die(mysqli_error());
                        while($fetch = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <th class="text-center"><?php echo $i++ ?></th>
                        <td style="width: 20%">
                        <?php echo $fetch['username'] ?>
                        </td>
                        <td style="width: 50%">
                            <?php echo $fetch['purpose'] ?>      
                        </td>
                        <td style="width: 35%">
                            <?php echo date('d M Y, g:i A', strtotime($fetch['datetime']));?>        
                        </td>  
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>