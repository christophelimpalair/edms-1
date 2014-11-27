<?php
include_once("../includes/header.php");

// test variable - simulate id 1
$_SESSION['salesperson'] = "1";
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    // build sql insert statement from posted values
    $sql = "SELECT * FROM Customer Where ID=".$id;
    try {
        // perform query
        foreach ($conn->query($sql) as $row) {
            $id = $row['id'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $addr = $row['address'];
            $city = $row['city'];
            $state = $row['state'];
            $zip = $row['zip'];
            $phone = $row['phone'];
            $email = $row['email'];
            $notes = $row['notes']; // need to add notes
        }
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

if (!empty($_POST['fname'])) {

    try {
        // query
        $sql = "UPDATE Customer SET fname=?, lname=?, address=?, city=?, state=?, zip=?, phone=?, email=?, notes=? WHERE id=?";
        $q = $conn->prepare($sql);
        $q->execute(array($_POST['fname'],$_POST['lname'],$_POST['addr'],$_POST['city'],$_POST['state'],$_POST['zip'],$_POST['phone'],$_POST['email'],$_POST['notes'],$id));
            // Print results
            echo '<div style="text-align: center;" class="alert-success alert-block">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo 'Success: Customer was updated successfully!';
            echo '</div>';     
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
?>
<!-- Page Content -->
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Prospect</h1>
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
                            Prospect Information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                        <div class="row">
                                            <div class="col-lg-4" style="padding-left: 30px; padding-right: 30px;" >
                                                <div class="form-group control-group">
                                                    <label>First Name</label>
                                                    <div class="controls">                                                   
                                                    <input placeholder="John" type="text" pattern="^[a-zA-Z]+$" title="Can only contain letters" <?php if(isset($_POST['fname'])){echo 'value="'.$_POST['fname'].'"'; } else { if(isset($fname)){echo 'value="'.$fname.'"'; }} ?> class="form-control" name="fname" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Last Name</label>
                                                    <div class="controls">
                                                    <input placeholder="Smith" type="text" pattern="^[a-zA-Z]+$" title="Can only contain letters" <?php if(isset($_POST['lname'])){echo 'value="'.$_POST['lname'].'"'; } else { if(isset($lname)){echo 'value="'.$lname.'"'; }}?> class="form-control" name="lname" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Address</label>
                                                    <div class="controls">
                                                    <input placeholder="330 Woodruff Road" type="text" pattern="^[a-zA-Z0-9 ]+$" title="Can only contain letters and numbers" <?php if(isset($_POST['addr'])){echo 'value="'.$_POST['addr'].'"'; } else { if(isset($addr)){echo 'value="'.$addr.'"'; }}?> class="form-control" name="addr" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>City</label>
                                                    <div class="controls">
                                                    <input placeholder="Greenville" type="text" pattern="^[a-zA-Z]+$" title="Can only contain letters" <?php if(isset($_POST['city'])){echo 'value="'.$_POST['city'].'"'; } else { if(isset($city)){echo 'value="'.$city.'"'; }}?> class="form-control" name="city" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.col-lg-6 (nested) -->
                                            <div class="col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                                                <div class="form-group control-group">
                                                    <label>State</label>
                                                    <div class="controls">
                                                    <input placeholder="SC" type="text" pattern="^[a-zA-Z]{2}$" title="Can only contain letters, 2 characters" <?php if(isset($_POST['state'])){echo 'value="'.$_POST['state'].'"'; } else { if(isset($state)){echo 'value="'.$state.'"'; }}?> class="form-control" name="state" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Zip</label>
                                                    <div class="controls">
                                                    <input placeholder="29607" type="number" pattern="^[0-9]{5}$" title="Can only contain letters" <?php if(isset($_POST['zip'])){echo 'value="'.$_POST['zip'].'"'; } else { if(isset($zip)){echo 'value="'.$zip.'"'; }}?> class="form-control" name="zip" required/>
                                                    </div>
                                                </div>
                                              <div class="form-group control-group">
                                                    <label>Phone</label>
                                                    <div class="controls">
                                                    <input placeholder="864-555-1212" type="text" pattern="\b[0-9]{3}-[0-9]{3}-[0-9]{4}\b" title="Must be a valid phone number" <?php if(isset($_POST['phone'])){echo 'value="'.$_POST['phone'].'"'; } else { if(isset($phone)){echo 'value="'.$phone.'"'; }}?> class="form-control" name="phone" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Email</label>
                                                    <div class="controls">
                                                    <input placeholder="jsmith@gmail.com" type="text" pattern="\b[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}\b" title="Must be a valid email address" <?php if(isset($_POST['email'])){echo 'value="'.$_POST['email'].'"'; } else { if(isset($email)){echo 'value="'.$email.'"'; }}?> class="form-control" name="email" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                                                <div class="form-group control-group">
                                                    <div class="controls">
                                                    <label>Customer Notes</label>
                                                    <textarea name="notes" rows=14 cols=60 class="form-control"><?php if(isset($_POST['notes'])){echo $_POST['notes']; } else { if(isset($notes)){echo $notes; }}?></textarea>
                                                    <input hidden type="text" name="id" <?php if(isset($id)){echo 'value="'.$id.'"'; } ?> />
                                            <!-- /.col-lg-6 (nested) -->
                                                    </div>
                                                </div>
                                            </div>
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
<script>
$(document).ready(function() {
document.getElementById('salesnav').click();
});
</script>