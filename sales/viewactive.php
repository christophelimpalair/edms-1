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
                        <h1 class="page-header">Active Deals</h1>
                        Notes: These customers have looked/are looking at a car, but not bought.
                    </div>            
                    <form id="accountForm" method="post" class="form-horizontal">
                        <br />
                        <div class="form-group">
				            <div class="row">
				                <div class="col-lg-12">
				                    <div class="panel panel-default">
				                        <div class="panel-heading">
				                            In Progress Deals
				                        </div>
				                        <!-- /.panel-heading -->
				                        <div class="panel-body">
				                            <div style="overflow-x: hidden;" class="table-responsive">
				                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
				                                    <thead>
				                                        <tr>
				                                        	<th>View</th>
				                                            <th>First Name</th>
				                                            <th>Last Name</th>
				                                            <th>City</th>
				                                            <th>State</th>
				                                            <th>Phone</th>
				                                            <th>Email</th>
				                                            <th>Status</th>
				                                        </tr>
				                                    </thead>
                            						<tbody>
                                						<?php
														    $query = ("select distinct f.id as finid, fname, lname, city, state, phone, email, status from finance f, customer c where f.status='pending' and f.customer_id = c.id");
														    $result = $conn -> query($query);
															$counter = $result -> rowCount();

														    foreach ($conn->query($query) as $row) {
															    echo "<tr>";
															    echo "<td><a href=activedeal.php?id=".$row['finid'].">View</a></td>";
																    echo "<td>".$row['fname']."</td>";
																    echo "<td>".$row['lname']."</td>";
																    echo "<td>".$row['city']."</td>";
																    echo "<td>".$row['state']."</td>";
																    echo "<td>".$row['phone']."</td>";
																    echo "<td>".$row['email']."</td>";
																    echo "<td>".$row['status']."</td>";
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

<?php include_once("../includes/footer.php") ?>