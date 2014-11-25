<?php
include_once("../includes/header.php");

//$_SESSION['has_customer'] = "1";
//$_SESSION['customer_name'] = "John";
?>
        <!-- Page Content -->
        <link href="/css/custom.css" rel="stylesheet">

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Vehicle Age Report</h1>
                    </div>            
                    <form id="accountForm" method="post" class="form-horizontal">
                        <br />
                        <div class="form-group">
				            <div class="row">
				                <div class="col-lg-12">
				                    <div class="panel panel-default">
				                        <div class="panel-heading">
				                            Select Vehicle
				                        </div>
				                        <!-- /.panel-heading -->
				                        <div class="panel-body">
				                            <div style="overflow-x: hidden;" class="table-responsive">
				                                <table class="table table-striped table-bordered table-hover" id="agereport">
				                                    <thead>
				                                        <tr>
				                                        	<th>View Photos</th>
				                       						<th>Age</th>
				                                            <th>Make</th>
				                                            <th>Model</th>
				                                            <th>Year</th>
				                                            <th>Mileage</th>
				                                            <th>Color</th>
				                                            <th>Price</th>
				                                        </tr>
				                                    </thead>
                            						<tbody>
                                						<?php
														    $query = ("select id, make, model, year, mileage, price, color, date_entered from vehicle where sold='no'");
														    $result = $conn -> query($query);
															$counter = $result -> rowCount();

														    foreach ($conn->query($query) as $row) {

														    	// format price
														    	$price = number_format($row['price']);
														    	
																// calculate age of vehicle
														    	$old_date = new DateTime($row['date_entered']);
														    	$today = new DateTime("now");
														    	$vehicleage =  date_diff($old_date, $today);
														    	
															    echo "<tr>";
															    echo "<td><a href=showVehicle.php?vehicle=".$row['id'].">View Car</a></td>";
															    echo "<td>".$vehicleage->format('%a days')."</td>";															    
															    echo "<td>".$row['make']."</td>";
															    echo "<td>".$row['model']."</td>";
															    echo "<td>".$row['year']."</td>";
															    echo "<td>".$row['mileage']."</td>";
															    echo "<td>".$row['color']."</td>";
															    echo "<td>$ ".$price."</td>";
															    echo "</tr>"; 
															}
													    ?>
													</tbody>
                        						</table>
                        					</div>
                        			    </div>
				                        <!-- /.panel-body -->
				                    </div>
				                    <!-- /.panel -->
				                </div>
        						<!-- /.col-lg-12 -->
			                </div>
			                <!-- /.col-lg-12 -->
                        </div>
                    </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

<!-- #modal-window -->
<div id="windowTitleDialog" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="windowTitleLabel" aria-hidden="true">
	<div class="modal-header">
		<a href="#" class="close" data-dismiss="modal">&times;</a>
		<h3>Please enter a new title for this window.</h3>
	</div>
	<div class="modal-body">
		<div class="divDialogElements">
			<input class="xlarge" id="xlInput" name="xlInput" type="text" />
		</div>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" onclick="closeDialog ();">Cancel</a>
		<a href="#" class="btn btn-primary" onclick="okClicked ();">OK</a>
	</div>
</div>

<?php include_once("../includes/footer.php") ?>