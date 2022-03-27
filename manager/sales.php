<div class="wrapper">
    <div class="card_b">
        <div class="card-header">
            <strong><i class="bx bx-data"></i>  Product Sales Data</strong>
        </div>
        <div class="card-body">
            <table id="datatableid" class="table table-bordered table-striped " style="width: 100%;">
                <thead>
                    <tr>
                        <th>Receipt Number</th>
                        <th>Customer Name</th>
                        <th>Cashier Name</th>
                        <th>Discount</th>
                        <th>Value(₱)</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="row_data">  
                <?php
                    $query = mysqli_query($conn, "SELECT s.receipt_no, sp.product_code, c.firstname as c_firstname, c.lastname as c_lastname,e.firstname as e_firstname ,e.lastname as e_lastname, total, prod.product_name, date, discount, qty, sp.price, prod.unit FROM sales s join customer c on c.cust_id = s.cust_id join employee e on e.employee_id=s.employee_id join sales_product sp on sp.receipt_no = s.receipt_no join product_details pd on pd.product_code = sp.product_code join product prod on prod.product_id = pd.product_id group by receipt_no") or die(mysqli_error());
                    while($fetch = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td style="width: 15%">
                        <?php echo $fetch['receipt_no'] ?>
                    </td>
                    <td style="width: 20%">
                        <?php echo $fetch['c_firstname'].', '.$fetch['c_lastname'] ?>      
                    </td>
                    <td style="width: 20%">
                        <?php echo $fetch['e_firstname'].', '.$fetch['e_lastname'] ?>      
                    </td>
                    <td style="width: 15%">
                    <?php echo $fetch['discount'] ?>%     
                    </td>
                    <td style="width: 15%">
                    ₱ <?php echo $fetch['total']?>        
                    </td>
                    <td class="action" style="width: 20%">
                    <button type="button" id="viewdata" data-bs-toggle="modal" data-bs-target="#viewsales-<?php echo $fetch['receipt_no']?>">View Sales</button>
                </tr>
                <?php include 'view_sales.php' ?>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>