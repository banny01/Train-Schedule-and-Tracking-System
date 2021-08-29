<?php
	include_once('inc/connection.php');
    include_once('inc/func.php');
    //date_default_timezone_set("Asia/Colombo");
		//$today = date("Y-m-d");
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
        $Date2 =    '';
        $Time = $_POST['Time'];

        if($Date==""){
            $Date2 = date("Y-m-d");
            $Date = date("l");            
        }
        else if($Date!=""){
            $Date2 = date("Y-m-d", $Date);
            $Date = date('l', $Date);            
        }
        if($Time==""){
            $Time = date("H:i");
        }
//echo $Time;
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
                    $query = "SELECT c.ID, a.TrainID, c.Number, c.Name, c.TrackID, a.StationID AS 'From', a.A AS 'Fa', a.D AS 'Fd', b.StationID AS 'To', b.A AS 'Ta', b.D AS 'Td', c.Status FROM stopststions AS a INNER JOIN stopststions AS b ON a.TrainID = b.TrainID JOIN train AS c ON c.ID = a.TrainID WHERE ((a.StationID = $From AND b.StationID = $To AND a.D < b.D) AND a.D > '$Time' AND c.Cancel = 0) AND (c.Status = 'DA' OR c.Status = 'WD') ORDER BY Fd ASC LIMIT 10;";

                    break;

                case "Tuesday":
                    $query = "SELECT c.ID, a.TrainID, c.Number, c.Name, c.TrackID, a.StationID AS 'From', a.A AS 'Fa', a.D AS 'Fd', b.StationID AS 'To', b.A AS 'Ta', b.D AS 'Td', c.Status FROM stopststions AS a INNER JOIN stopststions AS b ON a.TrainID = b.TrainID JOIN train AS c ON c.ID = a.TrainID WHERE ((a.StationID = $From AND b.StationID = $To AND a.D < b.D) AND a.D > '$Time' AND c.Cancel = 0) AND (c.Status = 'DA' OR c.Status = 'WD') ORDER BY Fd ASC LIMIT 10;";

                    break;

                case "Wednesday":
                    $query = "SELECT c.ID, a.TrainID, c.Number, c.Name, c.TrackID, a.StationID AS 'From', a.A AS 'Fa', a.D AS 'Fd', b.StationID AS 'To', b.A AS 'Ta', b.D AS 'Td', c.Status FROM stopststions AS a INNER JOIN stopststions AS b ON a.TrainID = b.TrainID JOIN train AS c ON c.ID = a.TrainID WHERE ((a.StationID = $From AND b.StationID = $To AND a.D < b.D) AND a.D > '$Time' AND c.Cancel = 0) AND (c.Status = 'DA' OR c.Status = 'WD') ORDER BY Fd ASC LIMIT 10;";

                    break;

                case "Thursday":
                    $query = "SELECT c.ID, a.TrainID, c.Number, c.Name, c.TrackID, a.StationID AS 'From', a.A AS 'Fa', a.D AS 'Fd', b.StationID AS 'To', b.A AS 'Ta', b.D AS 'Td', c.Status FROM stopststions AS a INNER JOIN stopststions AS b ON a.TrainID = b.TrainID JOIN train AS c ON c.ID = a.TrainID WHERE ((a.StationID = $From AND b.StationID = $To AND a.D < b.D) AND a.D > '$Time' AND c.Cancel = 0) AND (c.Status = 'DA' OR c.Status = 'WD') ORDER BY Fd ASC LIMIT 10;";

                    break;

                case "Friday":
                    $query = "SELECT c.ID, a.TrainID, c.Number, c.Name, c.TrackID, a.StationID AS 'From', a.A AS 'Fa', a.D AS 'Fd', b.StationID AS 'To', b.A AS 'Ta', b.D AS 'Td', c.Status FROM stopststions AS a INNER JOIN stopststions AS b ON a.TrainID = b.TrainID JOIN train AS c ON c.ID = a.TrainID WHERE ((a.StationID = $From AND b.StationID = $To AND a.D < b.D) AND a.D > '$Time' AND c.Cancel = 0) AND (c.Status = 'DA' OR c.Status = 'WD') ORDER BY Fd ASC LIMIT 10;";

                    break;

                case "Saturday":
                    $query = "SELECT c.ID, a.TrainID, c.Number, c.Name, c.TrackID, a.StationID AS 'From', a.A AS 'Fa', a.D AS 'Fd', b.StationID AS 'To', b.A AS 'Ta', b.D AS 'Td', c.Status FROM stopststions AS a INNER JOIN stopststions AS b ON a.TrainID = b.TrainID JOIN train AS c ON c.ID = a.TrainID WHERE ((a.StationID = $From AND b.StationID = $To AND a.D < b.D) AND a.D > '$Time' AND c.Cancel = 0) AND (c.Status = 'DA' OR c.Status = 'WE') ORDER BY Fd ASC LIMIT 10;";

                    break;

                case "Sunday":
                    $query = "SELECT c.ID, a.TrainID, c.Number, c.Name, c.TrackID, a.StationID AS 'From', a.A AS 'Fa', a.D AS 'Fd', b.StationID AS 'To', b.A AS 'Ta', b.D AS 'Td', c.Status FROM stopststions AS a INNER JOIN stopststions AS b ON a.TrainID = b.TrainID JOIN train AS c ON c.ID = a.TrainID WHERE ((a.StationID = $From AND b.StationID = $To AND a.D < b.D) AND a.D > '$Time' AND c.Cancel = 0) AND (c.Status = 'DA' OR c.Status = 'WE') ORDER BY Fd ASC LIMIT 10;";

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
                            <?php 
                                $query5 = "SELECT * FROM delay WHERE StationID=$From AND TrainID=$developer[ID] AND DATE(Date) = '$Date2' ORDER BY ID DESC LIMIT 1;";
                                $res5 = mysqli_query($con, $query5);
                                $delay = mysqli_fetch_assoc($res5);
                                //echo $query5;
                               
                                if("" != $delay['Delay']){ ?>
							        <td style="color: #990000; font-weight: bold; width: 17%;"><?php echo $delay['Delay']; ?> min(s) Delayed</td>
							
					        <?php } ?>
					        <?php if("" != $developer['TrackID']) { ?>
					        <td >
                                <form action="location/index.php" target="_blank" method="POST">
                                    <input type="hidden" name="trackID" value="?sessionid=<?php echo $developer['TrackID']; ?>">
                                    <input type="hidden" name="train" value="<?php echo $developer['Name']; ?>">
                                    <button class="btn" type="submit" style="border-radius: 5px; padding: 1px;" name="submit" value="submit" id="myBtn">Track Now</button>
                                </form>    
                            </td>
                            <?php } ?>
					        				   				   				  
					    </tr>
					<?php } ?>
				</tbody>
			</table>
    </div>
	<?php include("inc/footer.php"); ?>

</body>

</html>