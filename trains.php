<?php 
	session_start();
	include_once('inc/connection.php');
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="refresh" content="1800;url=logout.php" />
	<title>Train Management - Home</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/select2.min.js" type="text/javascript"></script>
	<link href="css/select2.min.css" rel="stylesheet" />
	
</head>
<body>

	<?php include("inc/header.php"); 
	
        $tID = null;
        $tNO = null;
        $tName = "";
        $tSID = null;
        $tStart = null;
        $tEID = null;
        $tEnd = null;
        $tTrackID = null;
        $tStatus = "";
        $tCancel = null;

		if (isset($_GET['ID'])){            

			$query = "SELECT * FROM train WHERE ID = $_GET[ID]";
			$res = mysqli_query($con, $query);

            while( $train = mysqli_fetch_assoc($res) ) { 
                $tID = $_GET['ID'];
                $tNO = $train['Number'];
                $tName = $train['Name'];
                $tSID= $train['Start'];
                $tStart = getStation($tSID, $con);
                $tEID = $train['End'];
                $tEnd = getStation($tEID, $con);
                $tTrackID = $train['TrackID'];
                $tStatus = $train['Status'];
                $tCancel = $train['Cancel'];
            }
		}

        function getStation($sID, $con){
            $sName = "";
            $query = "SELECT * FROM station WHERE ID = $sID";
			$res = mysqli_query($con, $query);
			$row = mysqli_fetch_assoc($res);
            $sName = $row['Name'];
            return $sName;
        }
	
	?>
	
	<div class="dashboard" style="width: 100%; margin: auto;">
        <div>
            <h1>Add / Edit Trains</h1>
        </div>
        <form action='trains.php' method="post"> 
            <div style="width: 35%; float: left;">
                <fieldset> 
                    <legend><h2 style="color: white;">Train Details</h2></legend>
                    <table class="Singuptb" style="width: 100%; color: white;">
                        <tr style="height: 30px; ">
                            <td style="width: 25%;">Train Number <i style="color: red;">*</i></td>
                            <td>:</td>
                            <td style="width: 40%;"><input Style="width: 40%;" type="text" name="Number" placeholder="Train Number" size="50"  value="<?php echo $tNO ?>" required></td>                       
                        </tr>
                    
                        <tr style="height: 30px;">
                            <td>Name <i style="color: red;">*</i></td>
                            <td>:</td>
                            <td><input Style="width: 50%;" type="text" name="Name" placeholder="Train Name" value="<?php echo $tName ?>" required></td>                       
                        </tr>
                        <tr style="height: 30px;">
                            <td style="width: 20%;">Start Station <i style="color: red;">*</i></td>
                            <td>:</td>
                            <td style="width: 80%;">
                                <select Style="width: 52%;" name="Start" class="js-example-basic-single" id="Start" required>
				                    <option value=<?php echo $tSID ?>><?php echo $tStart ?></option>				
				                    <?php
				                        $query = "SELECT * FROM station";
				                        $res = mysqli_query($con, $query);
					                    while($station = mysqli_fetch_assoc($res)){
						                    echo "<option value=".$station['ID'].">";
						                    echo $station['Name'];
						                    echo "</option>"; 
					                    }
				                    ?>
				                </select>
                            </td>                       
                        </tr>
                        <tr style="height: 30px;">
                            <td>End Station <i style="color: red;">*</i></td>
                            <td>:</td>
                            <td>
                                <select Style="width: 52%;" name="End" class="js-example-basic-single" id="End" required>
				                    <option value=<?php echo $tEID ?>><?php echo $tEnd ?></option>				
				                    <?php
				                        $query = "SELECT * FROM station";
				                        $res = mysqli_query($con, $query);
					                    while($station = mysqli_fetch_assoc($res)){
						                    echo "<option value=".$station['ID'].">";
						                    echo $station['Name'];
						                    echo "</option>"; 
					                    }
				                    ?>
				                </select>
                            </td>                       
                        </tr>
                        <tr style="height: 30px;">
                            <td>Tracking ID <i style="color: red;">*</i></td>
                            <td>:</td>
                            <td Style="width: 40%;"><input Style="width: 40%;" type="text" name="TrackID" placeholder="Tracking ID" value="<?php echo $tTrackID ?>"></td>                       
                        </tr>
                        <tr style="height: 30px;">
                            <td>Status <i style="color: red;">*</i></td>
                            <td>:</td>
                            <td>
                                <select Style="width: 42%;" name="Status" id="Status" required>
				                    <option value=<?php echo $tStatus ?>><?php echo $tStatus ?></option>
                                    <option value="DA">DA - Daily</option>
                                    <option value="WK">WK - Week end</option>				
				                    
				                </select>
                            </td>                       
                        </tr>
                        <tr style="height: 30px;">
                            <td>Cancel Status <i style="color: red;">*</i></td>
                            <td>:</td>
                            <td>
                                <select Style="width: 42%;" name="Cancel" id="Cancel" required>
				                    <option value=<?php echo $tCancel ?>><?php echo $tCancel ?></option>
                                    <option value=0>0 - Running</option>
                                    <option value=1>1 - Canceled</option>				
				                    
				                </select>
                            </td>                       
                        </tr>
                        
                    </table>
				    <p> 
                        <?php if (isset($_GET['ID'])){  ?> 
					        <button class="btn2" style="border-radius: 10px; padding: 5px;" type="submit" name="submit">Update</button>
                        <?php } ?>
                        <?php if (!isset($_GET['ID'])){  ?> 
					        <button class="btn2" style="border-radius: 10px; padding: 5px;" type="submit" name="submit">Save</button>
                        <?php } ?>
				    </p>
                </fieldset>
            </div>
            <div style="width: 60%; float: right;">
                <fieldset> 
                    <legend><h2 style="color: white;">Stop Stations</h2></legend>
                    <div class="" style="width: 100%; color: white;">
                        <table class="stations" id="stations" style="width: 100%;">
                            <tr>
                                <button class="schbtn" type="button" onclick="addRow();">Add Stop Station</button>
                            </tr>
                            <!--<tr>
                                <td style="width: 10%;">
                                    Station : 
                                </td>
                                <td style="width: 30%;">
                                    <select Style="width: 80% " name="End"  onkeypress="purchase_productList(1);" class="js-example-basic-single" id="End" required>
                                        <option value=<?php echo $tEID ?>><?php echo $tEnd ?></option>				
                                        <?php
                                            $query = "SELECT * FROM station";
                                            $res = mysqli_query($con, $query);
                                            while($station = mysqli_fetch_assoc($res)){
                                                echo "<option value=".$station['ID'].">";
                                                echo $station['Name'];
                                                echo "</option>"; 
                                            }
                                        ?>
				                    </select>
                                </td>
                                <td style="width: 7%;">
                                    Arrive : 
                                </td>
                                <td style="width: 20%;">
                                    <input style="border-radius: 10px; padding: 5px; " type="time" id="arrive" name="arrive">
                                </td>
                                <td style="width: 10%;">
                                    Departure : 
                                </td>
                                <td style="width: 20%;">
                                    <input style="border-radius: 10px; padding: 5px; " type="time" id="departure" name="departure">
                                </td>
                            </tr>-->
                        </table>
                            
                    </div>
                </fieldset>
            </div>
        </form>

    </div>
			
	<?php include("inc/footer.php"); ?>

</body>
<?php

	
?>
<script>
    var count = 0;
    function addRow(){
        var table = document.getElementById("stations");
        var row = table.insertRow(count);
        var php = "<?php $query = "SELECT * FROM station"; $res = mysqli_query($con, $query); while($station = mysqli_fetch_assoc($res)){ echo "<option value=".$station['ID'].">"; echo $station['Name']; echo "</option>"; } ?>";
        row.innerHTML = "<td style=\"width: 10%;\"> Station : </td> <td style=\"width: 30%\"> <select Style=\"width: 80% \" name=\"sStation["+count+"]\" class=\"js-example-basic-single\" id=\"sStation["+count+"]\" required> <option value='' > </option>" +php+ "</select> </td> <td style=\"width: 7%;\"> Arrive : </td> <td style=\"width: 20%;\"> <input style=\"border-radius: 10px; padding: 5px; \" type=\"time\" id=\"arrive["+count+"]\" name=\"arrive["+count+"]\" required></td> <td style=\"width: 10%;\"> Departure :</td><td style=\"width: 20%;\"> <input style=\"border-radius: 10px; padding: 5px; \" type=\"time\" id=\"departure["+count+"]\" name=\"departure["+count+"]\" required> </td>";
        //alert(php);
        count++;
    }

	$(document).ready(function() {
		$('.js-example-basic-single').select2();
	});

    
	
</script>
</html>