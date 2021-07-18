<?php 
	include_once('inc/connection.php');
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="refresh" content="1800;url=logout.php" />
	<title>Train Schedule and Tracking</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/select2.min.js" type="text/javascript"></script>
	<link href="css/select2.min.css" rel="stylesheet" />
	
</head>
<body>
    <div class="signup" style="float: right; margin-top: -90px;">
		<a class="signup" style="border-radius: 10px; padding: 5px; color: white;" href="login.php">Log In</a>		
	</div>
	<div class="login"> 		
		<?php
			
		?>
		<form action='search.php' method="post"> 
			<fieldset> 
				<legend><h1 style="color: white;">Search Trains</h1></legend>
				
				<p style="color: white; font-weight: bold;"><i style="color: red;">*</i> From : 
				<select Style="width: 70%;" name="From"  onkeypress="purchase_productList(1);" class="js-example-basic-single" id="From" required>
				<option value="">I'm at ...</option>
				
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
				</p>
				<p style="color: white; font-weight: bold;"><i style="color: red;">*</i> To &emsp;  : 
				<select Style="width: 70%;" name="To"  onkeypress="purchase_productList(1);" class="js-example-basic-single" id="To" required>
				<option value="">I want to go ...</option>
				
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
					
				</p>
				<span Style="width: 100%; "id="more">
					<table Style="width: 100%; ">
						<tr>
							<td>
								<p style="color: white; font-weight: bold;">Date : </p>
							</td>
							<td>
								<input  type="date" id="Date" name="Date" style="border-radius: 10px; padding: 5px; width: 55%;">
							</td>
						</tr>
						<tr>
							<td>
								<p style="color: white; font-weight: bold;">Time : </p>
							</td>
							<td>
								<input style="border-radius: 10px; padding: 5px; width: 40%;" type="time" id="Time" name="Time">
							</td>
						</tr>
					</table>
				</span>
				<p> 
					<script>
						var more = document.getElementById("more");
						more.style.display = "none";
						function myFunction() {
							
							if(more.style.display === "inline"){
								more.style.display = "none";
								myBtn.innerHTML = "More...";
							}
  							else{
								more.style.display = "inline";
								myBtn.innerHTML = "Less...";
							}
						}
					</script>
					
					<button type="button" style="border-radius: 10px; padding: 5px;" onclick="myFunction()" id="myBtn">More...</button>
					<button style="border-radius: 10px; padding: 5px; float:right;" type="submit" name="submit">Search</button>
				</p>
				
			</fieldset>
		</form>
		
		<script>
			$(document).ready(function() {
				$('.js-example-basic-single').select2();
			});
		</script>
	</div>
	<?php include("inc/footer.php"); ?>

</body>

</html>