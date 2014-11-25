<?php
include_once("../includes/header.php");
include_once '../includes/register.inc.php';
include_once '../includes/functions.php';
?>
<head>
    <meta charset="UTF-8">
    <title>Secure Login: Registration Form</title>
    <script type="text/JavaScript" src="../js/sha512.js"></script> 
    <script type="text/JavaScript" src="../js/forms.js"></script>
    <link rel="stylesheet" href="../css/main.css" />
</head>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                <div class="col-lg-12">
                <form method="post" name="registration_form" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>">
                           <div class="panel panel-default">
                        <div class="panel-heading">                                            
                            New User Information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                        <div class="row">
                                            <div class="col-lg-4" style="padding-left: 30px; padding-right: 30px;" >
                                                <div class="form-group control-group">
                                                    <label>Employee</label>
                                                    <div class="controls">                                                   
                                                    <select class="form-control" id="empid" name="empid">
                                                    <?php
                                                            $query = ("select id, fname, lname from employee");
                                                            //$counter = $result -> rowCount();
                                                            foreach ($conn->query($query) as $row) {
                                                                echo "<option value=".$row['id'].">".$row['fname']." ".$row['lname']."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Password</label>
                                                    <div class="controls">
                                                    <input type="password" id="password" class="form-control" name="password" required/>
                                                    </div>
                                                </div>
                                                
                                        <div class="row">
                                            <div class="col-md-3">
            <input type="button" 
                   value="Register" 
                   onclick="return regformhash(this.form,
                                   this.form.empid,
                                   this.form.password);" /> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php include_once("../includes/footer.php") ?>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
<script type="text/javascript" src="../js/validate.js"></script>