<?php
include_once("../includes/header.php");

if (!empty($_POST['fname'])) {

    try {
        // build sql insert statement from posted values
        $sql1 = "INSERT INTO Finance (employee_id, customer_id, vin, date, cost,) VALUES 
        ('".$_POST['fname']."','".$_POST['lname']."','".$_POST['addr']."','".$_POST['city']."','".$_POST['state']."',".$_POST['zip'].",
        '".$_POST['email']."','".$_POST['phone']."','".$_SESSION['empid']."','".$_POST['notes']."')";
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">New Vehicle Sale</h1>
                    </div>     
                    <div id="tabs">       
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#info-tab" id="tab" data-toggle="tab">1. Select Customer <i class="fa"></i></a></li>
                        <li><a href="#vehicle-tab" id="tab" data-toggle="tab">2. Pick Vehicle <i class="fa"></i></a></li>
                        <li><a href="#tradein-tab" id="tab" data-toggle="tab">3. Add Trade In <i class="fa"></i></a></li>
                        <li><a href="#approval-tab" id="tab" data-toggle="tab">4. Create Deal <i class="fa"></i></a></li>
                    </ul>
                    </div>
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
                                                                    <th>Price</th>
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
					                <!-- /row -->
                                </div>
                            </div>
                            <div class="tab-pane" id="tradein-tab" >
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
                                                                    <th>Customer</th>
                                                                    <th>VIN</th>
                                                                    <th>Make</th>
                                                                    <th>Model</th>
                                                                    <th>Year</th>
                                                                    <th>Color</th>
                                                                    <th>Mileage</th>
                                                                    <th>Offer</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    // trade price = appraised value of car
                                                                    $query = ("select * from tradeins");
                                                                    $result = $conn -> query($query);
                                                                    $counter = $result -> rowCount();

                                                                    foreach ($conn->query($query) as $row) {
                                                                        echo "<tr>";
                                                                        echo "<td><input type='radio' name='id' value=".$row['vin']."</td>";
                                                                        echo "<td>".$row['customer']."</td>";
                                                                        echo "<td>".$row['vin']."</td>";
                                                                        echo "<td>".$row['make']."</td>";
                                                                        echo "<td>".$row['model']."</td>";
                                                                        echo "<td>".$row['year']."</td>";
                                                                        echo "<td>".$row['color']."</td>";
                                                                        echo "<td>".$row['mileage']."</td>";
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
                                    <!-- /row -->
                                </div>
                            </div>
                            <div class="tab-pane" id="approval-tab" >
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <div class="form-group control-group" style="padding-top: 30px;padding-left: 20px;">
                                            <div class="controls">
                                            <label>Deal Notes</label>
                                            <textarea name="Description" cols=60 class="form-control" rows="9" id="comment" required><?php if(isset($_POST['Notes'])){echo $_POST['Notes']; }?></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4" style="padding-top: 10px;padding-left: 20px;">
                                                <button class="btn btn-primary btn-block" type="submit">Submit Deal</button>
                                            </div>
                                        </div>
                                    </div>
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

<script>
$(document).ready(function() {
    $('#dataTables1').dataTable();
    $('#dataTables2').dataTable();

    $('#info-tab').addClass('active');
    document.getElementById('salesnav').click();
});

function okClicked () {
    document.title = document.getElementById ("xlInput").value;
    closeDialog ();
    };
</script>
