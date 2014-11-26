<?php
include_once("../includes/header.php");

if (!empty($_POST['VIN'])) {
    // build sql insert statement from posted values
    $sql1 = "INSERT INTO Vehicle (id, make, model, year, mileage, color, description, cost, price, date_entered) VALUES 
    ('".$_POST['VIN']."','".$_POST['Make']."','".$_POST['Model']."',".$_POST['Year'].",".$_POST['Mileage'].",'".$_POST['Color']."',
    '".$_POST['Description']."','".$_POST['Cost']."','".$_POST['Price']."','".date("Y-m-d")."')";

    try {
        $query = "Select count(*) from vehicle where id='".$_POST['VIN']."'";
        $result = $conn->prepare($query); 
        $result->execute(); 
        $counter = $result->fetchColumn();

        if ($counter > 0) {
            echo '<div style="text-align: center;" class="alert-error alert-block">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo 'Error: Vehicle has already been added to the system.';
            echo '</div>';
        } else {
                // execute insert
                $conn->exec($sql1);
                // Make sure the user actually selected and uploaded a file
                if (isset($_FILES['files']) && $_FILES['files']['size'] > 0) {
                    // Temporary file name stored on the server
                    $tmpName = $_FILES['files']['tmp_name'];
                    try {
                        foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
                            // Read the file
                            $fp = fopen($tmp_name, 'r');
                            $data = fread($fp, filesize($_FILES['files']['tmp_name'][$key]));
                            //$data = $_FILES['files']['tmp_name'][$key];
                            $data = addslashes($data);
                            fclose($fp);

                            // Create the query and insert
                            // into our database.
                            $sql2 = "INSERT INTO VehiclePhotos (vin, image) VALUES ('".$_POST['VIN']."','$data')";
                            $conn->exec($sql2);
                        }
                        // Create the query and insert
                        // into our database.
                        $conn->exec($sql1);
                    }
                    catch(PDOException $e)
                    {
                        echo $e->getMessage();
                    }
                    // Print results
                    echo '<div style="text-align: center;" class="alert-success alert-block">';
                    echo '<a class="close" data-dismiss="alert">×</a>';
                    echo 'Success: Vehicle was added successfully!';
                    echo '</div>';

                    // clear post values so we don't resubmit
                    $vin = $_POST['VIN'];
                    unset($_POST);
                    unset($counter);
                }
            else {
                print "An error occurred!";
            }
        }
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Vehicle</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                <div class="col-lg-12">
                <form id="accountForm" method="post" enctype="multipart/form-data">
                    <div class="panel panel-default">
                        <div class="panel-heading">                                            
                            New Vehicle Information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                        <div class="row">
                                            <div class="col-lg-4" style="padding-left: 30px; padding-right: 30px;" >
                                                <div class="form-group control-group">
                                                    <label>VIN</label>
                                                    <div class="controls">                                                   
                                                    <input placeholder="1HGCR2F77EA005122" type="text" pattern="^[a-zA-Z0-9]{17}$" title="Must contain letters and numbers, 17 characters" <?php if(isset($_POST['VIN'])){echo 'value="'.$_POST['VIN'].'"'; }?> class="form-control" name="VIN" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Make</label>
                                                    <div class="controls">
                                                    <input placeholder="Honda" type="text" pattern="^[a-zA-Z]+$" title="Can only contain letters" <?php if(isset($_POST['Make'])){echo 'value="'.$_POST['Make'].'"'; }?> class="form-control" name="Make" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Model</label>
                                                    <div class="controls">
                                                    <input placeholder="Accord" type="text" pattern="^[a-zA-Z]+$" title="Can only contain letters" <?php if(isset($_POST['Model'])){echo 'value="'.$_POST['Model'].'"'; }?> class="form-control" name="Model" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Year</label>
                                                    <div class="controls">
                                                    <input placeholder="2015" type="number" pattern="^[0-9]{4}$" title="Must be 4 digits" <?php if(isset($_POST['Year'])){echo 'value="'.$_POST['Year'].'"'; }?> class="form-control" name="Year" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.col-lg-6 (nested) -->
                                            <div class="col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                                                <div class="form-group control-group">
                                                    <label>Mileage</label>
                                                    <div class="controls">
                                                    <input placeholder="100" type="number" pattern="^[0-9]+$" title="Can only contain digits" <?php if(isset($_POST['Mileage'])){echo 'value="'.$_POST['Mileage'].'"'; }?> class="form-control" name="Mileage" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Color</label>
                                                    <div class="controls">
                                                    <input placeholder="Black" type="text" pattern="^[a-zA-Z]+$" title="Can only contain letters" <?php if(isset($_POST['Color'])){echo 'value="'.$_POST['Color'].'"'; }?> class="form-control" name="Color" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Sales Cost</label>
                                                    <div class="controls">
                                                    <input placeholder="19500" type="number" pattern="^[0-9]+$" title="Can only contain numbers" <?php if(isset($_POST['Cost'])){echo 'value="'.$_POST['Cost'].'"'; }?> class="form-control" name="Cost" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Sales Price</label>
                                                    <div class="controls">
                                                    <input placeholder="21500" type="number" pattern="^[0-9]+$" title="Can only contain numbers" <?php if(isset($_POST['Price'])){echo 'value="'.$_POST['Price'].'"'; }?> class="form-control" name="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                                               <div class="form-group control-group">
                                                    <label>Select Images</label>
                                                    <input class="btn btn-default btn-file btn-block" type="file" id="file" name="files[]" multiple accept="image/*" required/>
                                                </div>
                                                <div class="form-group control-group" >
                                                    <div class="controls">
                                                    <label>Description</label>
                                                    <textarea name="Description" cols=60 class="form-control" rows="9" id="comment" required><?php if(isset($_POST['Description'])){echo $_POST['Description']; }?></textarea>
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