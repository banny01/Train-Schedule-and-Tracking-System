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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
</head>
<body>
    <div class="signup" style="float: right; margin-top: -90px;">
		<a class="signup" style="border-radius: 10px; padding: 5px; color: white;" href="login.php">Log In</a>		
	</div>
	<div class="login"> 		
		<form action='login.php' method="post"> 
			<fieldset> 
				<legend><h1 style="color: white;">Search Trains</h1></legend>
				
				<p style="color: white;">From : 
				<input type="text" name="From" placeholder="I'm at ...">
				</p>
				<p style="color: white;">To : 
					<input type="text" name="To" placeholder="I want to go ...">
				</p>
				<p> 
					<button style="border-radius: 10px; padding: 5px;" type="submit" name="submit">More...</button>
					<button style="border-radius: 10px; padding: 5px; float:right;" type="submit" name="submit">Search</button>
				</p>
				
			</fieldset>
		</form>
		
	</div>
	<?php include("inc/footer.php"); ?>

</body>

</html>