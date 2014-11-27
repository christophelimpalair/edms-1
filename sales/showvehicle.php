<?php
include_once("../includes/header.php");

if (!empty($_POST['VIN'])) {

    try {
        // build sql insert statement from posted values
        $sql = "UPDATE Vehicle SET make=?, model=?, year=?, mileage=?, color=?, description=?, cost=?, price=? WHERE id=?";
        $q = $conn->prepare($sql);
        $q->execute(array($_POST['Make'],$_POST['Model'],$_POST['Year'],$_POST['Mileage'],$_POST['Color'],$_POST['Description'],$_POST['Cost'],$_POST['Price'],$_POST['VIN']));

        // Print results
        echo '<div style="text-align: center;" class="alert-success alert-block">';
        echo '<a class="close" data-dismiss="alert">×</a>';
        echo 'Success: Vehicle was updated successfully!';
        echo '</div>';
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
        // clear post values so we don't resubmit
        $vin = $_POST['VIN'];
        unset($_POST);
        unset($counter);
}

if (!empty($_GET['VIN'])) {
    // build sql insert statement from posted values
    try {
        $query = "Select * from vehicle where id='".$_GET['VIN']."'";
        foreach($conn->query($query) as $row) {
            $Make = $row['make'];
            $Model = $row['model'];
            $Year = $row['year'];
            $Mileage = $row['mileage'];
            $Cost = $row['cost'];
            $Price = $row['price'];
            $Description = $row['description'];
            $Color = $row['color'];
            $VIN = $row['id'];
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
                    <h1 class="page-header">Show Vehicle</h1>
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
                            Vehicle Information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                        <div class="row">
                                            <div class="col-lg-4" style="padding-left: 30px; padding-right: 30px;" >
                                                <div class="form-group control-group">
                                                    <label>VIN</label>
                                                    <div class="controls">                                                   
                                                    <input placeholder="1HGCR2F77EA005122" type="text" pattern="^[a-zA-Z0-9]{17}$" title="Must contain letters and numbers, 17 characters" <?php if(isset($_POST['VIN'])){echo 'value="'.$_POST['VIN'].'"'; }else { if(isset($VIN)){echo 'value="'.$VIN.'"'; }}?> class="form-control" name="VIN" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Make</label>
                                                    <div class="controls">
                                                    <input placeholder="Honda" type="text" pattern="^[a-zA-Z]+$" title="Can only contain letters" <?php if(isset($_POST['Make'])){echo 'value="'.$_POST['Make'].'"'; }else { if(isset($Make)){echo 'value="'.$Make.'"'; }}?> class="form-control" name="Make" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Model</label>
                                                    <div class="controls">
                                                    <input placeholder="Accord" type="text" pattern="^[a-zA-Z]+$" title="Can only contain letters" <?php if(isset($_POST['Model'])){echo 'value="'.$_POST['Model'].'"'; }else { if(isset($Model)){echo 'value="'.$Model.'"'; }}?> class="form-control" name="Model" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Year</label>
                                                    <div class="controls">
                                                    <input placeholder="2015" type="number" pattern="^[0-9]{4}$" title="Must be 4 digits" <?php if(isset($_POST['Year'])){echo 'value="'.$_POST['Year'].'"'; }else { if(isset($Year)){echo 'value="'.$Year.'"'; }}?> class="form-control" name="Year" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.col-lg-6 (nested) -->
                                            <div class="col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                                                <div class="form-group control-group">
                                                    <label>Mileage</label>
                                                    <div class="controls">
                                                    <input placeholder="100" type="number" pattern="^[0-9]+$" title="Can only contain digits" <?php if(isset($_POST['Mileage'])){echo 'value="'.$_POST['Mileage'].'"'; }else { if(isset($Mileage)){echo 'value="'.$Mileage.'"'; }}?> class="form-control" name="Mileage" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Color</label>
                                                    <div class="controls">
                                                    <input placeholder="Black" type="text" pattern="^[a-zA-Z]+$" title="Can only contain letters" <?php if(isset($_POST['Color'])){echo 'value="'.$_POST['Color'].'"'; }else { if(isset($Color)){echo 'value="'.$Color.'"'; }}?> class="form-control" name="Color" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Sales Cost</label>
                                                    <div class="controls">
                                                    <input placeholder="19500" type="number" pattern="^[0-9]+$" title="Can only contain numbers" <?php if(isset($_POST['Cost'])){echo 'value="'.$_POST['Cost'].'"'; }else { if(isset($Cost)){echo 'value="'.$Cost.'"'; }}?> class="form-control" name="Cost" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group control-group">
                                                    <label>Sales Price</label>
                                                    <div class="controls">
                                                    <input placeholder="21500" type="number" pattern="^[0-9]+$" title="Can only contain numbers" <?php if(isset($_POST['Price'])){echo 'value="'.$_POST['Price'].'"'; }else { if(isset($Price)){echo 'value="'.$Price.'"'; }}?> class="form-control" name="Price" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4" style="padding-left: 30px; padding-right: 30px;">
                                                <label>Photos</label><br />
                                                <?php $query = ("select * from vehiclephotos where vin='".$_GET['VIN']."'");
                                                $result = $conn -> query($query);
                                                foreach ($conn->query($query) as $row) {
                                                    $image = $row['image'];
                                                    echo '<a href="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" data-title="'.$Year.' '.$Make.' '.$Model.'" data-toggle="lightbox"><img width="50px" style="padding:2px;" height="auto" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/></a>';
                                                } ?>
                                                <div>&nbsp;</div>
                                                <div class="form-group control-group" >
                                                    <div class="controls">
                                                    <label>Description</label>
                                                    <textarea name="Description" cols=60 class="form-control" rows="9" id="comment" required><?php if(isset($_POST['Description'])){echo $_POST['Description']; }else { if(isset($Description)){echo $Description; }}?></textarea>
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
<script>
$(document).ready(function() {
document.getElementById('salesnav').click();
});
$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
}); 
</script>
