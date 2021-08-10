<?php 
	session_start();
	include_once('inc/connection.php');
    include_once('inc/func.php');
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
    <script>
        var count = 0;
    </script>
	<?php include("inc/header.php"); 
	
        $tID = null;
        $tNO = null;
        $tName = "";
        $tSID = null;
        $tStart = null;
        $tEID = null;
        $tEnd = null;
        $tTrackID = null;
        $tStatus = "DA";
        $tCancel = 0;

        $isUpdate = 0;

		if (isset($_GET['ID'])){            

			$query = "SELECT * FROM train WHERE ID = $_GET[ID]";
			$res = mysqli_query($con, $query);
            $query2 = "SELECT * FROM stopststions WHERE TrainID = $_GET[ID] ORDER BY ID ASC";
			$resStation = mysqli_query($con, $query2);
            $rowcount=mysqli_num_rows($resStation);
            echo "<script> count = $rowcount;</script>";
            $isUpdate = 1;
            //echo "AAAAAAAAAAAAAAA";

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
                            <td style="width: 40%;"><input Style="width: 40%;" type="text" name="Number" placeholder="Train Number" size="50"  value="<?php echo $tNO ?>" required>
                            <input type="hidden" name="isUpdate" value="<?php echo $isUpdate ?>">
                            <input type="hidden" name="tID" value="<?php echo $tID ?>">
                            </td>                       
                        </tr>
                    
                        <tr style="height: 30px;">
                            <td>Name <i style="color: red;">*</i></td>
                            <td>:</td>
                            <td><input Style="width: 50%;" type="text" name="Name" placeholder="Train Name" value="<?php echo $tName ?>" required></td>                       
                        </tr>
                        <tr style="height: 30px;">
                            <td style="width: 20%;">From <i style="color: red;">*</i></td>
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
                            <td>To <i style="color: red;">*</i></td>
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
                            <td>Tracking ID </td>
                            <td>:</td>
                            <td Style="width: 40%;"><input Style="width: 40%;" type="text" name="TrackID" placeholder="Tracking ID" value="<?php echo $tTrackID ?>"></td>                       
                        </tr>
                        <tr style="height: 30px;">
                            <td>Status </td>
                            <td>:</td>
                            <td>
                                <select Style="width: 42%;" name="Status" id="Status" required>
				                    <option value=<?php echo $tStatus ?>><?php echo $tStatus ?></option>
                                    <option value="DA">DA - Daily</option>
                                    <option value="WD">WD - Week days</option>
                                    <option value="WE">WE - Week ends</option>				
				                    
				                </select>
                            </td>                       
                        </tr>
                        <tr style="height: 30px;">
                            <td>Cancel Status </td>
                            <td>:</td>
                            <td>
                                <select Style="width: 42%;" name="Cancel" id="Cancel">
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
                        <button class="schbtn" type="button" onclick="addRow();">Add Stop Station</button>
                        <table class="stations" id="stations" style="width: 100%;">
                           <?php 
                            if (isset($_GET['ID'])){ 
                                $count = 0;
                                while( $stat = mysqli_fetch_assoc($resStation) ) { 
                                    $ststName = getStation($stat['StationID'], $con); ?>
                            <tr>
                                <td style="width: 10%;">
                                    Station : 
                                </td>
                                <td style="width: 30%;">
                                    <select Style="width: 80% " name="stationRow[<?php echo $count ?>][station]"  onkeypress="purchase_productList(1);" class="js-example-basic-single" id="End" required>
                                        <option value="<?php echo $stat['StationID'] ?>"><?php echo $ststName ?></option>				
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
                                    <input style="border-radius: 10px; padding: 5px; " type="time" id="arrive" name="stationRow[<?php echo $count ?>][arrive]" value="<?php echo $stat['A'] ?>">
                                </td>
                                <td style="width: 10%;">
                                    Departure : 
                                </td>
                                <td style="width: 20%;">
                                    <input style="border-radius: 10px; padding: 5px; " type="time" id="departure" name="stationRow[<?php echo $count ?>][departure]" value="<?php echo $stat['D'] ?>">
                                </td>
                            </tr>
                            <?php $count++; } } ?>
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
    
    function addRow(){
        var table = document.getElementById("stations");
        var row = table.insertRow(count);
        var php = "<?php $query = "SELECT * FROM station"; $res = mysqli_query($con, $query); while($station = mysqli_fetch_assoc($res)){ echo "<option value=".$station['ID'].">"; echo $station['Name']; echo "</option>"; } ?>";
        row.innerHTML = "<td style=\"width: 10%;\"> Station : </td> <td style=\"width: 30%\"> <select Style=\"width: 80% \" name=\"stationRow["+count+"][station]\" class=\"js-example-basic-single\" id=\"stationRow["+count+"]\" required> <option value='' > </option>" +php+ "</select> </td> <td style=\"width: 7%;\"> Arrive : </td> <td style=\"width: 20%;\"> <input style=\"border-radius: 10px; padding: 5px; \" type=\"time\" id=\"arrive["+count+"]\" name=\"stationRow["+count+"][arrive]\" required></td> <td style=\"width: 10%;\"> Departure :</td><td style=\"width: 20%;\"> <input style=\"border-radius: 10px; padding: 5px; \" type=\"time\" id=\"departure["+count+"]\" name=\"stationRow["+count+"][departure]\" required> </td>";
        //alert(php);
        count++;
    }

	$(document).ready(function() {
		$('.js-example-basic-single').select2();
	});

    
	
</script>
<?php
    if(isset($_POST['submit'])){
        $trainID;
        $tNO = $_POST['Number'];
        $tName = $_POST['Name'];
        $tSstation = $_POST['Start'];
        $tEstation = $_POST['End'];
        $tTrId = $_POST['TrackID'];
        $tStat = $_POST['Status'];
        $tCan = $_POST['Cancel'];
        $isUpdate = $_POST['isUpdate'];
        $tID = $_POST['tID'];
        if($tTrId == '')
            $tTrId = 0;

        if($isUpdate == 0){
            //echo "wwwwwwwwwwwwww";
            $query = "INSERT INTO train (Number, Name, Start, End, TrackID, Status, Cancel) VALUES ($tNO, '{$tName}', $tSstation, $tEstation, '{$tTrId}', '{$tStat}', $tCan)";
            mysqli_query($con, $query);
            $query0 = "SELECT ID FROM train WHERE Start = $tSstation AND End = $tEstation";
            $result_set = mysqli_query($con, $query0);
            while( $train = mysqli_fetch_assoc($result_set) ) { 
                $trainID = $train['ID'];
            }
            //echo $query;
            $stationRow = $_POST['stationRow'];
            foreach($stationRow as $row){
                //echo $row['station'];
                $query1 = "INSERT INTO stopststions (TrainID, StationID, A, D) VALUES ($trainID, '$row[station]', '$row[arrive]', '$row[departure]')";
                mysqli_query($con, $query1);
            }

        }

        if($isUpdate == 1){
            echo $tID;
            $query0 = "DELETE FROM stopststions WHERE TrainID = $tID";
            mysqli_query($con, $query0);
            $query = "UPDATE train SET Number = $tNO, Name = '{$tName}', Start = $tSstation, End = $tEstation, TrackID = '{$tTrId}', Status = '{$tStat}', Cancel = $tCan WHERE ID = $tID";
            mysqli_query($con, $query);

            $stationRow = $_POST['stationRow'];
            foreach($stationRow as $row){
                //echo $row['station'];
                $query1 = "INSERT INTO stopststions (TrainID, StationID, A, D) VALUES ($tID, '$row[station]', '$row[arrive]', '$row[departure]')";
                mysqli_query($con, $query1);
            }
        }
    }

?>
</html>