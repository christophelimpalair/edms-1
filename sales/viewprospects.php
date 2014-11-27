<?php
include_once("../includes/header.php");
?>
        <!-- Page Content -->
        <link href="/css/custom.css" rel="stylesheet">

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">My Prospects</h1>
                    </div>            
                    <form id="accountForm" method="post" class="form-horizontal">
                        <br />
                        <div class="form-group">
				            <div class="row">
				                <div class="col-lg-12">
				                    <div class="panel panel-default">
				                        <div class="panel-heading">
				                            Sales Prospect information
				                        </div>
				                        <!-- /.panel-heading -->
				                        <div class="panel-body">
				                            <div style="overflow-x: hidden;" class="table-responsive">
				                                <table class="table table-striped table-bordered table-hover" id="prospects">
				                                    <thead>
				                                        <tr>
				                                        	<th>View</th>
				                                            <th>First Name</th>
				                                            <th>Last Name</th>
				                                            <th>City</th>
				                                            <th>State</th>
				                                       		<th>Zip</th>
				                                            <th>Phone</th>
				                                            <th>Email</th>
				                                        </tr>
				                                    </thead>
                            						<tbody>
                                						<?php
														    $query = ("select * from customer where salesperson='".$_SESSION['empid']."'");
														    $result = $conn -> query($query);
															//$counter = $result -> rowCount();
														    foreach ($conn->query($query) as $row) {
															    echo "<tr>";
															    echo "<td><a href=prospect.php?id=".$row['id'].">View</a></td>";
															    echo "<td>".$row['fname']."</td>";
															    echo "<td>".$row['lname']."</td>";
															    echo "<td>".$row['city']."</td>";
															    echo "<td>".$row['state']."</td>";
															    echo "<td>".$row['zip']."</td>";
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
                    </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

<?php include_once '../includes/footer.php'; ?>
<script>
$(document).ready(function() {
document.getElementById('salesnav').click();
});
</script>