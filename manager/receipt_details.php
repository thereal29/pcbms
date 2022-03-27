<div class="wrapper">
    <div class="card_b">
        <div class="card-header">
            <strong>RECEIPT No. <?php echo $_GET['id'] ?></strong>
        </div>
        <div class="card-body">
            <table id="datatableid" class="table table-bordered table-striped " style="width: 100%;">
                <thead>
                    <tr>
                        <th>Barcode</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Price(₱)</th>
                    </tr>
                </thead>
                <tbody id="row_data">  
                <?php
                    $query = mysqli_query($conn, "SELECT sp.receipt_no, sp.product_code, c.firstname as c_firstname, c.lastname as c_lastname,e.firstname as e_firstname ,e.lastname as e_lastname, total, prod.product_name, date, discount, qty, sp.price, prod.unit FROM sales s join customer c on c.cust_id = s.cust_id join employee e on e.employee_id=s.employee_id join sales_product sp on sp.receipt_no = s.receipt_no join product_details pd on pd.product_code = sp.product_code join product prod on prod.product_id = pd.product_id where sp.receipt_no = '".$_GET['id']."'") or die(mysqli_error());
                    while($fetch = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td style="width: 15%">
                        <?php echo $fetch['product_code'] ?>
                    </td>
                    <td style="width: 30%">
                        <?php echo $fetch['product_name']?>      
                    </td>
                    <td style="width: 15%">
                        <?php echo $fetch['qty']?>      
                    </td>
                    <td style="width: 15%">
                    <?php if( $fetch['qty'] > 1)
                        { $s='s';
                        }else{ $s='';} ?>
                        <?php echo $fetch['unit'].''.$s ?>    
                    </td>
                    <td style="width: 15%">
                    ₱ <?php echo $fetch['price']?>        
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <a type="button" class="float-right mr-5" id="newdata" href="index.php?page=sales"> << Go Back</a>
    </div>
</div>