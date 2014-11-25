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
                        <h1 class="page-header">User Accounts</h1>
                    </div>            
                    <form id="accountForm" method="post" class="form-horizontal">
                        <br />
                        <div class="form-group">
				            <div class="row">
				                <div class="col-lg-12">
				                    <div class="panel panel-default">
				                        <div class="panel-heading">
				                            Active Users
				                        </div>
				                        <!-- /.panel-heading -->
				                        <div class="panel-body">
				                            <div style="overflow-x: hidden;" class="table-responsive">
				                                <table class="table table-striped table-bordered table-hover" id="inventory">
				                                    <thead>
				                                        <tr>
				                                        	<th>First Name</th>
				                                            <th>Last Name</th>
				                                            <th>Date Created</th>
				                                            <th>Last Modified</th>				                                     
				                                            <th>Role</th>
				                                            <th>Department</th>
				                                            <th>Edit User</th>
				                                        </tr>
				                                    </thead>
                            						<tbody>
                                						<?php
														    $query = ("select * from usersview");
														    $result = $conn -> query($query);

														    foreach ($conn->query($query) as $row) {
															    echo "<tr>";
															    echo "<td>".$row['fname']."</td>";
															    echo "<td>".$row['lname']."</td>";
															    echo "<td>".$row['hire_date']."</td>";
															    echo "<td>".$row['last_modified']."</td>";
															    echo "<td>".$row['role']."</td>";
															    echo "<td>".$row['department']."</td>";
															    echo "<td><a href=edituser.php?vehicle=".$row['id'].">Edit</a></td>";															
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