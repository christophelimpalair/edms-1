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
                        <h1 class="page-header">Vehicle Inventory</h1>
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
				                                <table class="table table-striped table-bordered table-hover" id="inventory">
				                                    <thead>
				                                        <tr>
				                                        	<th>View</th>
				                                            <th>VIN</th>
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
														    $query = ("select id, make, model, year, mileage, price, color from vehicle where sold='no'");
														    $result = $conn -> query($query);
															//$counter = $result -> rowCount();

														    foreach ($conn->query($query) as $row) {
															    echo "<tr>";
															    echo "<td><a href=showVehicle.php?VIN=".$row['id'].">View</a></td>";
																echo "<td>".$row['id']."</td>";
															    echo "<td>".$row['make']."</td>";
															    echo "<td>".$row['model']."</td>";
															    echo "<td>".$row['year']."</td>";
															    echo "<td>".$row['mileage']."</td>";
															    echo "<td>".$row['color']."</td>";
															    echo "<td>$".number_format($row['price'])."</td>";
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
<script>
$(document).ready(function() {
document.getElementById('salesnav').click();
});
</script>