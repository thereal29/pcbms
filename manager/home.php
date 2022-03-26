 <div class="wrapper">
    <div class="row col-md-12">
        <div class="col-md-8">
            <div class="row col-md-12">
                <div class="col-sm-6">
                    <div class="small-box shadow-sm border">
                    <div class="inner">
                        <h3><?php echo $conn->query("SELECT * FROM employee ")->num_rows; ?></h3>

                        <p>Total Employees</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-tie"></i>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="small-box shadow-sm border">
                    <div class="inner">
                        <h3><?php echo $conn->query("SELECT * FROM customer")->num_rows; ?></h3>

                        <p>Total Customers</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    </div>
                </div>         
            </div>
            <div class="row col-12">
                <div class="col-sm-6">
                    <div class="small-box shadow-sm border">
                    <div class="inner">
                        <h3><?php echo $conn->query("SELECT * FROM supplier")->num_rows; ?></h3>

                        <p>Total Supppliers</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-friends"></i>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="small-box shadow-sm border">
                    <div class="inner">
                        <h3><?php echo $conn->query("SELECT * FROM product_delivery WHERE status = 'Delivered'")->num_rows; ?></h3>

                        <p>Total Products</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-coffee"></i>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row col-12">
                <div class="col-sm-6">
                    <div class="small-box shadow-sm border">
                    <div class="inner">
                        <h3><?php echo $conn->query("SELECT * FROM users WHERE username != '' OR password != ''")->num_rows; ?></h3>

                        <p>Total Registered Accounts</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="small-box shadow-sm border">
                    <div class="inner">
                    <?php $result =  mysqli_query($conn,"SELECT sum(qty) FROM sales_product");
                    while ($row = mysqli_fetch_array($result)) {
                        if(mysqli_num_rows($result) != 0 && $row[0] != Null){
                            if( $row[0] > 1){
                                 $s='s';
                            }else{
                                 $s='';
                            }
                         echo '<h3> '.$row[0].' <small>Unit'.$s.'</small></h3>';
                        }
                        else{
                        echo '<h3>0</h3>';
                        }
                    }
                    ?>
                        <p>Total Product Sales</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row col-12">
            <!-- RECENT PRODUCTS -->
                <div class="card_b shadow h-100">
                    <div class="card-header">
                        <strong><i class="bx bx-data"></i>   Recent Products</strong>
                    </div>
                    <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="h6 mb-0 mr-0 text-gray-800">
                                    <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <div class="list-group">
                                                <?php 
                                                    $query = "SELECT product_name, quantity_stock, unit FROM product, product_details group by product.product_id order by product.product_id  DESC LIMIT 10";
                                                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        if( $row['quantity_stock'] > 1)
                                                        { $s='s';
                                                        }else{ $s='';}
                                                        echo "<div class='list-group-item list-group-item-success text-gray-800'>
                                                            <i class='fas fa-barcode'></i> ".$row['product_name']."
                                                            <small>(".$row['quantity_stock']." ".$row['unit']."".$s.")</small>
                                                            </div>";
                                                    }
                                                ?>
                                            </div>
                                        <!-- /.list-group -->
                                        </div>
                                    <!-- /.panel-body -->
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        success_login();
    }); 
</script>