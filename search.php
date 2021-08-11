<?php
	include_once('inc/connection.php');
    include_once('inc/func.php');
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Train Schedule and Tracking - Search</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
</head>

<?php
    if (isset($_POST['submit'])){
        date_default_timezone_set("Asia/Colombo");
        //$DateTime = getdate();
        $From = $_POST['From'];
        $To = $_POST['To'];
        $Date = strtotime($_POST['Date']);
        $Time = $_POST['Time'];

        if($Date==""){
            $Date = date("l");
        }
        else if($Date!=""){
            $Date = date('l', $Date);
        }
        if($Time==""){
            $Time = date("H:i");
        }

    }
?>

<body>
    <div class="signup" style="float: right; margin-top: -0px;">
		<a class="signup" style="border-radius: 10px; padding: 5px; color: white;" href="index.php">< Go back to <span style="color:#990000; font-weight: bold; "> Train Schedule</span></a>		
	</div>
	<div style="color: white;">
        <?php
            
            $query = "";

            switch($Date){
                case "Monday":
                    $query = "SELECT a.TrainID, c.Number, c.Name, c.TrackID, a.StationID AS 'From', a.A AS 'Fa', a.D AS 'Fd', b.StationID AS 'To', b.A AS 'Ta', b.D AS 'Td', c.Status FROM stopststions AS a INNER JOIN stopststions AS b ON a.TrainID = b.TrainID JOIN train AS c ON c.ID = a.TrainID WHERE ((a.StationID = $From AND b.StationID = $To AND a.D < b.D) AND a.D > TIME('$Time'+':00') AND c.Cancel = 0) AND (c.Status = 'DA' OR c.Status = 'WD') ORDER BY Fd ASC LIMIT 10;";

                    break;

                case "Tuesday":
                    $query = "SELECT a.TrainID, c.Number, c.Name, c.TrackID, a.StationID AS 'From', a.A AS 'Fa', a.D AS 'Fd', b.StationID AS 'To', b.A AS 'Ta', b.D AS 'Td', c.Status FROM stopststions AS a INNER JOIN stopststions AS b ON a.TrainID = b.TrainID JOIN train AS c ON c.ID = a.TrainID WHERE ((a.StationID = $From AND b.StationID = $To AND a.D < b.D) AND a.D > TIME('$Time'+':00') AND c.Cancel = 0) AND (c.Status = 'DA' OR c.Status = 'WD') ORDER BY Fd ASC LIMIT 10;";

                    break;

                case "Wednesday":
                    $query = "SELECT a.TrainID, c.Number, c.Name, c.TrackID, a.StationID AS 'From', a.A AS 'Fa', a.D AS 'Fd', b.StationID AS 'To', b.A AS 'Ta', b.D AS 'Td', c.Status FROM stopststions AS a INNER JOIN stopststions AS b ON a.TrainID = b.TrainID JOIN train AS c ON c.ID = a.TrainID WHERE ((a.StationID = $From AND b.StationID = $To AND a.D < b.D) AND a.D > TIME('$Time'+':00') AND c.Cancel = 0) AND (c.Status = 'DA' OR c.Status = 'WD') ORDER BY Fd ASC LIMIT 10;";

                    break;

                case "Thursday":
                    $query = "SELECT a.TrainID, c.Number, c.Name, c.TrackID, a.StationID AS 'From', a.A AS 'Fa', a.D AS 'Fd', b.StationID AS 'To', b.A AS 'Ta', b.D AS 'Td', c.Status FROM stopststions AS a INNER JOIN stopststions AS b ON a.TrainID = b.TrainID JOIN train AS c ON c.ID = a.TrainID WHERE ((a.StationID = $From AND b.StationID = $To AND a.D < b.D) AND a.D > TIME('$Time'+':00') AND c.Cancel = 0) AND (c.Status = 'DA' OR c.Status = 'WD') ORDER BY Fd ASC LIMIT 10;";

                    break;

                case "Friday":
                    $query = "SELECT a.TrainID, c.Number, c.Name, c.TrackID, a.StationID AS 'From', a.A AS 'Fa', a.D AS 'Fd', b.StationID AS 'To', b.A AS 'Ta', b.D AS 'Td', c.Status FROM stopststions AS a INNER JOIN stopststions AS b ON a.TrainID = b.TrainID JOIN train AS c ON c.ID = a.TrainID WHERE ((a.StationID = $From AND b.StationID = $To AND a.D < b.D) AND a.D > TIME('$Time'+':00') AND c.Cancel = 0) AND (c.Status = 'DA' OR c.Status = 'WD') ORDER BY Fd ASC LIMIT 10;";

                    break;

                case "Saturday":
                    $query = "SELECT a.TrainID, c.Number, c.Name, c.TrackID, a.StationID AS 'From', a.A AS 'Fa', a.D AS 'Fd', b.StationID AS 'To', b.A AS 'Ta', b.D AS 'Td', c.Status FROM stopststions AS a INNER JOIN stopststions AS b ON a.TrainID = b.TrainID JOIN train AS c ON c.ID = a.TrainID WHERE ((a.StationID = $From AND b.StationID = $To AND a.D < b.D) AND a.D > TIME('$Time'+':00') AND c.Cancel = 0) AND (c.Status = 'DA' OR c.Status = 'WE') ORDER BY Fd ASC LIMIT 10;";

                    break;

                case "Sunday":
                    $query = "SELECT a.TrainID, c.Number, c.Name, c.TrackID, a.StationID AS 'From', a.A AS 'Fa', a.D AS 'Fd', b.StationID AS 'To', b.A AS 'Ta', b.D AS 'Td', c.Status FROM stopststions AS a INNER JOIN stopststions AS b ON a.TrainID = b.TrainID JOIN train AS c ON c.ID = a.TrainID WHERE ((a.StationID = $From AND b.StationID = $To AND a.D < b.D) AND a.D > TIME('$Time'+':00') AND c.Cancel = 0) AND (c.Status = 'DA' OR c.Status = 'WE') ORDER BY Fd ASC LIMIT 10;";

                    break;
                     
            }
            $res = mysqli_query($con, $query);
            //echo $query; 
            //echo $From,$To,$Date,$Time," T+ = "+$Time+date("H:i", "02:00:00");
        ?>
        <br><br><br><br>
        <h2 style="text-align: center;">Search Results...</h2>
        <table id="data_table" class="trains" >
				
				<tbody>
					<?php while( $developer = mysqli_fetch_assoc($res) ) { ?>
					    <tr id="<?php echo $developer['TrainID']; ?>" style="padding: 20px;">
					        <td><?php echo $developer['Number']; ?></td>
					        <td ><?php echo $developer['Name']; ?></td>
					        <td>
                                <div> 
                                    <?php 
                                        echo getStation($developer['From'], $con); ?> 
                                </div>
                                <div>
                                    <?php echo date('h:i A', strtotime($developer['Fd'])); ?> 
                                </div>
                            </td>
					        <td >
                                <div> 
                                    <?php echo getStation($developer['To'], $con); ?> 
                                </div>
                                <div>
                                    <?php echo date('h:i A', strtotime($developer['Ta'])); ?> 
                                </div>
                            </td>
					        <?php if($developer['TrackID'] != 0) { ?>
					        <td ><button class="btn" type="button" style="border-radius: 5px; padding: 1px;" onclick="location.href = 'track.php?ID=<?php echo $developer['TrackID']; ?>';" id="myBtn">Track Now</button></td>
                            <?php } ?>
					        <!--<td ><button class="btn" type="button" style="border-radius: 5px; padding: 1px;" onclick="location.href = 'home.php?Delete=<?php echo $developer['ID']; ?>';" id="myBtn">Delete</button></td>  -->				   				   				  
					    </tr>
					<?php } ?>
				</tbody>
			</table>
    </div>
	<?php include("inc/footer.php"); ?>

</body>

</html>