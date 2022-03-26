<div class="pos-wrapper">         
        <section class="left">
            <div class="mt-1 ml-5 mb-0" >
				<table class="table-responsive-sm">
					<tbody>
						<tr>
                            <?php
                            if($row['job_id'] == 1)
                            {
                                $job='Manager';
                            }
                            else{
                                $job='Cashier';
                            }
                            ?>
							<td  style="font-size:16px; color: #05300e; font-weight:bold;" valign="baseline">User Logged on:</td>
							<td style="font-size:16px; color: #05300e; font-weight:bold;" valign="baseline"><p class="pt-3 ml-5"><i class="fas fa-user-shield"></i> <?php echo $job?></p></td>
						</tr>
						<tr>
							<td style="font-size:16px; color: #05300e; font-weight:bold;" valign="baseline">Date:</td>
							<td style="font-size:16px; color: #05300e; font-weight:bold;" valign="baseline"><p class="p-0 ml-5"><i class="fas fa-calendar-alt">&nbsp</i><span id='time'></span></p></td>
						</tr>
						<tr>
							<td style="font-size:16px; color: #05300e; font-weight:bold;" valign="baseline"> <input type="hidden" name="eid" id="eid" value="<?php echo $row['employee_id'] ?>"/>Customer Name:</td>
							<td valign="baseline">
                                <div class="content p-0 ml-5">
                                    <select id="customer" class="customer form-control" name='customer' data-placeholder="Search Customer" required>
                                        <?php 
                                            $sql = mysqli_query($conn, "SELECT * FROM customer order by cust_id asc") or die ("Bad SQL: $sql");
                                            echo "<option></option>";
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                echo "<option value=".$row['cust_id'].">" . $row['firstname'] ." ". $row['lastname'] ."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
								
								<td valign="baseline"><button type="button" class="ml-3" id="newdata" data-bs-toggle="modal" data-bs-target="#addCustomerModal"><i class="fa fa-plus"></i> New Customer</button></td>
                                <?php  include 'add_customer.php' ?>
						</tr>
					</tbody>
				</table>
			</div>
        <div class="card_b" style="width:95%;  margin-top:20px;">
            <div class="card-header">
                <strong><i class="bx bx-data"></i>  Order's Data</strong>
            </div>
            <div class="card-body">
                <div class="mt-0" id="product_area" class="table-responsive-sm" style="min-height: 250px;" >
                    <form  method="POST" action="">
                    <table class="table-striped w-100 font-weight-bold" style="cursor: pointer;" id="table2">
                        <thead>
                            <tr class='text-center'>
                                <th style="font-weight:bold; font-size:14px;">Barcode</th>
                                <th style="font-weight:bold; font-size:14px;">Product Name</th>
                                <th style="font-weight:bold; font-size:14px;">Price</th>
                                <th style="font-weight:bold; font-size:14px;">Unit</th>
                                <th style="font-weight:bold; font-size:14px;">Qty</th>
                                <th style="font-weight:bold; font-size:14px;">Sub.Total</th>
                                <th style="font-weight:bold; font-size:14px;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableData">
                        </tbody>
                    </table>
                    </form>
                    </div>
                    <div id="table_buttons">
                        <button id="buttons" type="button" class="Enter btn btn-block btn-warning mt-3"><i class="fas fa-handshake"></i> PROCEED TO PAYMENT</button>
                        <div class="mt-2">
                            <small>
                            <ul class="justify-content-center">
                                <li class="d-flex mb-0 ml-2">Discount (%):&nbsp&nbsp&nbsp&nbsp<input style="width: 100px" type="number" name="discount" value="" min="1" placeholder="Enter Discount" id="discount"></li>
                                <li class="d-flex mb-0">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<p class="dis m-0"></p></li>
                                <li class="d-flex ml-2">Total(₱):&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<p id="totalValue1">₱ 0.00</p></li>
                            </ul>
                        </small>
                        </div>
                    </div>
                </div>
            </div> 
        </section>
        <section class="right">
            <div class="header_price mr-3">
				<h5>Grand Total</h5>
				<p style="float: right; margin-top:-20px; margin-right:20px; font-size: 30px;" id="totalValue">₱ 0.00</p>
			</div>
        <div class="card_b" style="width:95%; margin-top:40px;">
            <div class="card-header">
                <strong><i class="bx bx-data"></i>  Products's Data</strong>
            </div>
            <div class="card-body">
                <div class="mt-1 mb-3">
                        <div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span></div>
                        <input class="form-control" type="text" placeholder="Product Search" aria-label="Search" id="search" name="search" onkeyup="loadproducts();"/>
                        </div>
                    </div>
                    <div class="mt-0" id="product_area2" class="table-responsive-sm mt-2" >
                        <table class="w-100 table-striped font-weight-bold" style="cursor: pointer;" id="table1">
                            <thead>
                                <tr class='text-center' > <b>
                                    <td style="font-weight:bold; font-size:14x;">Barcode</td>
                                    <td style="font-weight:bold; font-size:14px;">Product Name</td>
                                    <td style="font-weight:bold; font-size:14px;">Price</td>
                                    <td style="font-weight:bold; font-size:14px;">Unit</td>
                                    <td style="font-weight:bold; font-size:14px;">Stocks</td>
                                </tr></b>
                                <tbody id="products">
                                    
                                </tbody>
                            </thead>
                        </table>
                    </div>
                    <div class="w-100 mt-2" id="enter_area">
                        <button id="buttons" type="button" class="cancel btn btn-danger border"><i class="fas fa-ban"></i> Cancel</button>
                    </div>
                </div>
            </div>
        </div>  
        </section>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        success_login();
    }); 
    
</script>