<?php
include_once("../includes/header.php");

//$_SESSION['has_customer'] = "1";
//$_SESSION['customer_name'] = "John";
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">New Vehicle Sale</h1>
                    </div>            
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#info-tab" data-toggle="tab">1. Select Customer <i class="fa"></i></a></li>
                        <li><a href="#vehicle-tab" data-toggle="tab">2. Pick Vehicle <i class="fa"></i></a></li>
                        <li><a href="#approval-tab" data-toggle="tab">3. Create Deal <i class="fa"></i></a></li>
                        <li><a href="#deal-tab" data-toggle="tab">4. Send Deal <i class="fa"></i></a></li>
                    </ul>
                    <form id="accountForm" method="post" class="form-horizontal">
                        <div class="tab-content">
                            <div class="tab-pane" id="info-tab" >
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    Select Customer
                                                </div>
                                                <!-- /.panel-heading -->
                                                <div class="panel-body">
                                                    <div style="overflow-x: hidden;" class="table-responsive">
                                                        <table class="table table-striped table-bordered table-hover" id="dataTables1">
                                                        <thead>
                                                            <tr>
                                                                <th>View</th>
                                                                <th>First Name</th>
                                                                <th>Last Name</th>
                                                                <th>City</th>
                                                                <th>State</th>
                                                                <th>Phone</th>
                                                                <th>Email</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $query = ("select * from customer");
                                                                $result = $conn -> query($query);
                                                                $counter = $result -> rowCount();

                                                                foreach ($conn->query($query) as $row) {
                                                                    echo "<tr>";
                                                                    echo "<td><input type='radio' name='id' value=".$row['id']."</td>";
                                                                    echo "<td>".$row['fname']."</td>";
                                                                    echo "<td>".$row['lname']."</td>";
                                                                    echo "<td>".$row['city']."</td>";
                                                                    echo "<td>".$row['state']."</td>";
                                                                    echo "<td>".$row['phone']."</td>";
                                                                    echo "<td>".$row['email']."</td>";
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
                            </div>                         
                            <div class="tab-pane" id="vehicle-tab" >
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
						                                <table class="table table-striped table-bordered table-hover" id="dataTables2">
						                                    <thead>
						                                        <tr>
						                                        	<th>Select</th>
						                                            <th>VIN</th>
						                                            <th>Make</th>
						                                            <th>Model</th>
						                                            <th>Year</th>
						                                            <th>Color</th>
						                                            <th>Mileage</th>
						                                        </tr>
						                                    </thead>
                                    						<tbody>
	                                    						<?php
																    $query = ("select * from vehicle");
																    $result = $conn -> query($query);
																	$counter = $result -> rowCount();

																    foreach ($conn->query($query) as $row) {
																	    echo "<tr>";
																	    echo "<td><input type='radio' name='id' value=".$row['id']."</td>";
																	    echo "<td>".$row['id']."</td>";
																	    echo "<td>".$row['make']."</td>";
																	    echo "<td>".$row['model']."</td>";
																	    echo "<td>".$row['year']."</td>";
																	    echo "<td>".$row['color']."</td>";
																	    echo "<td>".$row['mileage']."</td>";
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
					                <!-- /row -->
                                </div>
                            </div>

                            <div class="tab-pane" id="approval-tab" >
                                <div class="form-group">
                                    Insert Approval Processing -- Manager only?
                                </div>
                            </div>
                            <div class="tab-pane" id="deal-tab" >
                                <div class="form-group">
                                    Submit Selections for Manager Approval?
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

<?php include_once("../includes/footer.php") ?>
<!-- DataTables JavaScript -->
<script src="../js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="../js/plugins/dataTables/dataTables.bootstrap.js"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables1').dataTable();
    $('#dataTables2').dataTable();
    $('#customerModal').bind('show', function () {
        document.getElementById ("xlInput").value = document.title;
    });

    $('#info-tab').addClass('active');
});

function closeDialog () {
    $('#customerModal').modal('hide'); 
    };

function okClicked () {
    document.title = document.getElementById ("xlInput").value;
    closeDialog ();
    };
</script>
