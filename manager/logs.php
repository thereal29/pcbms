<div class="wrapper">
    <div class="card_b">
        <div class="card-header">
            <strong><i class="bx bx-data"></i>  List of Logs/Transactions</strong>
        </div>
        <div class="card-body">
            <table id="datatableid" class="table table-bordered table-striped " style="width: 100%;">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Username</th>
                        <th>Activity</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody id="row_data">  
                    <?php
                        $i = 1;
                        $query = mysqli_query($conn, "SELECT * FROM logs ORDER BY log_id DESC") or die(mysqli_error());
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
                            <?php echo date('d M Y, g:i A', strtotime($fetch['logs_datetime']));?>        
                        </td>  
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>