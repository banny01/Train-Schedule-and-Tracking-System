<?php 
	session_start();
	include_once('inc/connection.php');
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="refresh" content="1800;url=logout.php" />
	<title>Train Management - Add Delay</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/select2.min.js" type="text/javascript"></script>
	<link href="css/select2.min.css" rel="stylesheet" />
	
</head>
<body>

	<?php include("inc/header.php"); 
    $errors = 2;
    $trainID = $_GET['Train'];
    $query = "SELECT * FROM delay WHERE TrainID = '{$trainID}' AND StationID = $loggeduser[StationID] AND DATE(Date) = '$today'";
    $res = mysqli_query($con, $query);
    $delay = mysqli_fetch_assoc($res);
    if($loggeduser['StationID'] == 0){

    }

    if (isset($_POST['submit'])){
        
        $train = $_POST['TrainID'];
        $station = $_POST['StationID'];
        $del = $_POST['Delay'];

        if (isset($delay['ID'])) {  
            $query2 = "UPDATE delay SET  Delay = '{$del}' WHERE TrainID = '{$trainID}' AND StationID = $loggeduser[StationID] AND DATE(Date) = '$today'";
            $result_set2 = mysqli_query($con, $query2);
            
            if ($result_set2) {
                $errors = 0;               
            }
            else{
                $errors = 1;
            }
        }
        else{            
            $query2 = "INSERT INTO delay (TrainID, StationID, Delay) VALUES ('{$train}', '{$station}', '{$del}')";
            $result_set2 = mysqli_query($con, $query2);

            if ($result_set2) {
                $errors = 0;               
            }
            else{
                $errors = 1;
            }
        }
    }
	?>
	
    <div class="login" style="margin-top: 10px;"> 
		
		<form action='#' method="post"> 
			<fieldset>
				<legend><h1>Add Delay</h1></legend>
				<!--<p class="error">Invalid User Name or Password.!</p>-->
				<?php 
                if ($errors==1) {                    
					echo ('<p class="error">Error.! Please try again.</p>');					
				}
                else if($errors==0){
                    echo ('<p class="done">Delay Added Successfully.</p>');
                }
                ?>
                <table class="Singuptbl">
                    <tr style="height: 30px; ">
                        <td style="width: 90px; color: white;">Train ID <i style="color: red;">*</i></td>
                        <td>:</td>
                        <td><input style="width: 200px; background-color: #cfcfcf;" type="text" name="TrainID" value="<?php echo "$trainID" ?>" readonly></td>                     
                    </tr>                    
                    <tr style="height: 30px;">
                        <td style="width: 90px; color: white;">Station ID <i style="color: red;">*</i></td>
                        <td>:</td>
                        <td>
                        <?php
                        if($loggeduser['StationID'] == 0){ ?>
                        <select Style="width: 70%;" name="StationID"  onkeypress="purchase_productList(1);" class="js-example-basic-single" id="StationID" required>
				            <option value="">Please Select a Station</option>				
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
                        <?php }
                        else if(isset($delay['ID'])){ ?> 
                            <input style="width: 200px; background-color: #cfcfcf;" type="text" name="StationID" value="<?php echo "$loggeduser[StationID]" ?>" readonly>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr style="height: 30px;">
                        <td style="width: 90px; color: white;">Delay <i style="color: red;">*</i></td>
                        <td>:</td>
                        <?php
                        if($loggeduser['StationID'] == 0){ ?>
                        <td><input style="width: 200px;" type="text" name="Delay" placeholder="Delay (mins)" required></td>     
                        <?php }
                        else if(isset($delay['ID'])) { ?>  
                        <td><input style="width: 200px;" type="text" name="Delay" placeholder="Delay" value="<?php echo "$delay[Delay]" ?>" required></td>
                        <?php } ?>                 
                    </tr>
                </table>
				<p> 
                <?php
                    if($loggeduser['StationID'] == 0){ ?>
					<button style="border-radius: 10px; padding: 5px;" type="submit" name="submit">Add</button>
                    <?php }
                    else if(isset($delay['ID'])) { ?> 
                    <button style="border-radius: 10px; padding: 5px;" type="submit" name="submit">Update</button>
                    <?php } ?>     
				</p>
				
			</fieldset>
		</form>
		
	</div>

	<?php include("inc/footer.php"); ?>

</body>
<script>
			$(document).ready(function() {
				$('.js-example-basic-single').select2();
			});
		</script>
</html>