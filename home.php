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
	
	//echo $today;
		if (isset($_GET['Delete'])){
			$tID = $_GET['Delete'];
			$query1 = "DELETE FROM train WHERE ID = $tID";
			mysqli_query($con, $query1);
			$query2 = "DELETE FROM trainlines WHERE TrainID = $tID";
			mysqli_query($con, $query2);
			$query3 = "DELETE FROM stopststions WHERE TrainID = $tID";
			mysqli_query($con, $query3);
			$query4 = "DELETE FROM delay WHERE TrainID = $tID";
			mysqli_query($con, $query4);
		}
		
		if($loggeduser['Role'] == "Admin"){
			$query = "SELECT * FROM train";
			if (isset($_GET['train'])){
				$query = "SELECT * FROM train WHERE Number LIKE '%$_GET[train]%'";
				$res = mysqli_query($con, $query);
				$row = mysqli_fetch_array($res);
				if($row == 0){
					$query = "SELECT * FROM train WHERE Name LIKE '%$_GET[train]%'";
				}
			}
			$res = mysqli_query($con, $query);
		}
		else if($loggeduser['Role'] == "SM"){
			$station = $loggeduser['StationID'];
			if($loggeduser['StationID'] == 2){
				$station = 1;
			}
			$query = "SELECT DISTINCT(train.ID), train.Number, train.Name, train.Start, train.End, train.TrackID, train.Status, train.Cancel FROM train INNER JOIN trainlines ON train.ID = trainlines.TrainID INNER JOIN linestations ON trainlines.LineID = linestations.LineID WHERE linestations.StationID = $station";
			if (isset($_GET['train'])){
				$query = "SELECT DISTINCT(train.ID), train.Number, train.Name, train.Start, train.End, train.TrackID, train.Status, train.Cancel FROM train INNER JOIN trainlines ON train.ID = trainlines.TrainID INNER JOIN linestations ON trainlines.LineID = linestations.LineID WHERE linestations.StationID = $station AND train.Number LIKE '%$_GET[train]%'";
				$res = mysqli_query($con, $query);
				$row = mysqli_fetch_array($res);
				if($row == 0){
					$query = "SELECT DISTINCT(train.ID), train.Number, train.Name, train.Start, train.End, train.TrackID, train.Status, train.Cancel FROM train INNER JOIN trainlines ON train.ID = trainlines.TrainID INNER JOIN linestations ON trainlines.LineID = linestations.LineID WHERE linestations.StationID = $station AND train.Name LIKE '%$_GET[train]%'";
				}
			}
			$res = mysqli_query($con, $query);
		}
	
	?>
	
	<div class="dashboard" style="width: 100%; margin: auto;">
		<div class="btns">
			<!--<button class="btn2" type="button" onclick="location.href = 'addDelay.php';" id="myBtn">Add Delay</button>-->
			<?php if($loggeduser['Role'] == "Admin"){ ?>
				<button class="btn2" type="button" onclick="location.href = 'addTrain.php'" id="myBtn">Add Train</button>
				<button class="btn2" type="button" onclick="location.href = 'signup.php';" id="myBtn">Add User</button>
			<?php } ?>
		</div>
		<div class="search">
  			<input style="width: 40%; border-radius: 10px; padding: 5px; float: left;" type="text" name="tarin" id="train" value="" placeholder="Train No / Name">
			<button class="btn" type="button" style="border-radius: 10px; padding: 5px; margin-left: 10px;;" onclick="search()" id="myBtn">Search</button>
		</div>
		
	</div>
		
	 <div class="table" >
	 	<h1>Trains</h2>
            <table id="data_table" class="trains" >
				<thead>
					<tr>
						<th style="width: 15%;">Number</th>
						<th style="width: 40%;">Name</th>
						<th style="width: 10%;">Start</th>
						<th style="width: 10%;">End</th>
						<th style="width: 15%;">TrackID</th>
						<th style="width: 10%;">Status</th>
						<th style="width: 10%;">Running Status</th>	
						<th style="width: 10%;">Delay</th>												
					</tr>
				</thead>
				<tbody>
					<?php while( $developer = mysqli_fetch_assoc($res) ) { ?>
					   <tr id="<?php echo $developer['ID']; ?>">
					   <td><?php echo $developer['Number']; ?></td>
					   <td ><?php echo $developer['Name']; ?></td>
					   <td><?php echo $developer['Start']; ?></td>
					   <td ><?php echo $developer['End']; ?></td>
					   <td><?php echo $developer['TrackID']; ?></td> 
					   <td ><?php echo $developer['Status']; ?></td>
					   <td ><?php echo $developer['Cancel']; ?></td>
					   <?php 
					   		
					   		if($loggeduser['StationID'] != ""){
					   			$query5 = "SELECT * FROM delay WHERE StationID=$loggeduser[StationID] AND TrainID=$developer[ID] AND DATE(Date) = '$today'";
								$res5 = mysqli_query($con, $query5);
								$delay = mysqli_fetch_assoc($res5);
						   }
						   else{
								$delay['Delay'] = "";
						   }
					   ?>
					   <td ><?php echo $delay['Delay']; ?></td>
					   <td ><button class="btn" type="button" style="border-radius: 5px; padding: 1px;" onclick="location.href = 'delay.php?Train=<?php echo $developer['ID']; ?>';" id="myBtn">Delay</button></td>
					   <td ><button class="btn" type="button" style="border-radius: 5px; padding: 1px;" onclick="location.href = 'edit.php?ID=<?php echo $developer['ID']; ?>';" id="myBtn">Edit</button></td>
					   <td ><button class="btn" type="button" style="border-radius: 5px; padding: 1px;" onclick="location.href = 'home.php?Delete=<?php echo $developer['ID']; ?>';" id="myBtn">Delete</button></td>  				   				   				  
					   </tr>
					<?php } ?>
				</tbody>
			</table>
        </div>
			
	<?php include("inc/footer.php"); ?>

</body>
<?php

	$input = filter_input_array(INPUT_POST);
	if ($input['action'] == 'edit') {
		$update_field='';
		if(isset($input['Number'])) {
			$update_field.= "Number='".$input['Number']."'";
		} 
		else if(isset($input['Name'])) {
			$update_field.= "Name='".$input['Name']."'";
		} 
		else if(isset($input['Start'])) {
			$update_field.= "Start='".$input['Start']."'";
		} 
		else if(isset($input['End'])) {
			$update_field.= "End='".$input['End']."'";
		}
		else if(isset($input['TrackID'])) {
			$update_field.= "TrackID='".$input['TrackID']."'";
		}
		else if(isset($input['Status'])) {
			$update_field.= "Status='".$input['Status']."'";
		}
		if($update_field && $input['id']) {
			$sql_query = "UPDATE lab_lis_qc_default_values SET $update_field WHERE id='" . $input['id'] . "'";
			mysqli_query($con, $sql_query) or die("database error:". mysqli_error($con));
		}
	}
?>
<script>
	$(document).ready(function() {
		$('.js-example-basic-single').select2();
	});

	function search(){
		var train = document.getElementById("train").value;
		if(train == ""){
			location.href = "home.php";
		}
		else{
			location.href = "home.php?train="+train;
		}
	}
</script>
</html>