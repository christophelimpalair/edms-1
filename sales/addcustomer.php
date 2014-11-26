<?php
include_once("../includes/header.php");

if (!empty($_POST['fname'])) {
    // build sql insert statement from posted values
    $sql1 = "INSERT INTO Customer (fname, lname, address, city, state, zip, email, phone, salesperson, notes) VALUES 
    ('".$_POST['fname']."','".$_POST['lname']."','".$_POST['addr']."','".$_POST['city']."','".$_POST['state']."',".$_POST['zip'].",
    '".$_POST['email']."','".$_POST['phone']."','".$_SESSION['empid']."','".$_POST['notes']."')";

echo $sql1;
    try {
        $query = "Select count(*) from customer where fname='".$_POST['fname']."' and lname='".$_POST['lname']."' and address='".$_POST['addr']."' and city='".$_POST['city']."'";
        $result = $conn->prepare($query); 
        $result->execute(); 
        $counter = $result->fetchColumn();

        if ($counter > 0) {
            echo '<div style="text-align: center;" class="alert-error alert-block">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo 'Error: Customer has already been added to the system.';
            echo '</div>';
        } else {
                // execute insert
                $conn->exec($sql1);

                // Print results
                echo '<div style="text-align: center;" class="alert-success alert-block">';
                echo '<a class="close" data-dismiss="alert">×</a>';
                echo 'Success: Customer was added successfully!';
                echo '</div>';
                unset($_POST);        
        }
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
?>
<!-- Page Content -->
<style type="text/css">
        .textareaContainer {
            width: 600px;
            border: 1px solid #999;
            padding: 20px;
            margin-bottom: 30px;
        }

        textarea {
            width: 100%;
        }

        .border-box {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -o-box-sizing: border-box;
        }

        .content-box {
            box-sizing: content-box;
            -moz-box-sizing: content-box;
            -webkit-box-sizing: content-box;
            -o-box-sizing: content-box;
        }
</style>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Prospect</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                <div class="col-lg-12">
                <form id="accountForm" method="post">
                    <div class="panel panel-default">
                        <div class="panel-heading">                                            
                            New Prospect Information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                        <div class="row">
                                            <div class="col-lg-4" style="padding-left: 30px; padding-right: 30px;" >
                                                <div class="form-group control-group">
                                                    <label>First Name</label>
                                                    <div class="controls">                                                   
                                                    <input placeholder="John" type="text" pattern="^[a-zA-Z]+$" title="Can only contain letters" <?php if(isset($_POST['fname'])){echo 'value="'.$_POST['fname'].'"'; }?> class="form-control" name="fname" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Last Name</label>
                                                    <div class="controls">
                                                    <input placeholder="Smith" type="text" pattern="^[a-zA-Z]+$" title="Can only contain letters" <?php if(isset($_POST['lname'])){echo 'value="'.$_POST['lname'].'"'; }?> class="form-control" name="lname" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Address</label>
                                                    <div class="controls">
                                                    <input placeholder="330 Woodruff Road" type="text" pattern="^[a-zA-Z0-9 ]+$" title="Can only contain letters and numbers" <?php if(isset($_POST['addr'])){echo 'value="'.$_POST['addr'].'"'; }?> class="form-control" name="addr" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>City</label>
                                                    <div class="controls">
                                                    <input placeholder="Greenville" type="text" pattern="^[a-zA-Z]+$" title="Can only contain letters" <?php if(isset($_POST['city'])){echo 'value="'.$_POST['city'].'"'; }?> class="form-control" name="city" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.col-lg-6 (nested) -->
                                            <div class="col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                                                <div class="form-group control-group">
                                                    <label>State</label>
                                                    <div class="controls">
                                                    <input placeholder="SC" type="text" pattern="^[a-zA-Z]{2}$" title="Can only contain letters, 2 characters" <?php if(isset($_POST['state'])){echo 'value="'.$_POST['state'].'"'; }?> class="form-control" name="state" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Zip</label>
                                                    <div class="controls">
                                                    <input placeholder="29607" type="number" pattern="^[0-9]{5}$" title="Can only contain letters" <?php if(isset($_POST['zip'])){echo 'value="'.$_POST['zip'].'"'; }?> class="form-control" name="zip" required/>
                                                    </div>
                                                </div>
                                              <div class="form-group control-group">
                                                    <label>Phone</label>
                                                    <div class="controls">
                                                    <input placeholder="864-555-1212" type="text" pattern="\b[0-9]{3}-[0-9]{3}-[0-9]{4}\b" title="Must be a valid phone number" <?php if(isset($_POST['phone'])){echo 'value="'.$_POST['phone'].'"'; }?> class="form-control" name="phone" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Email</label>
                                                    <div class="controls">
                                                    <input placeholder="jsmith@gmail.com" type="text" pattern="\b[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}\b" title="Must be a valid email address" <?php if(isset($_POST['email'])){echo 'value="'.$_POST['email'].'"'; }?> class="form-control" name="email" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                                                <div class="form-group control-group" >
                                                    <div class="controls">
                                                    <label>Customer Notes</label>
                                                    <textarea name="notes" textarea name="notes" rows=14 cols=60 class="form-control" class="form-control"><?php if(isset($_POST['notes'])){echo $_POST['notes']; }?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.col-lg-6 (nested) -->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3" style="padding-left: 30px;">
                                                <button class="btn btn-primary" type="submit">Save</button>
                                            </div>
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