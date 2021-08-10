<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Train Management</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body style="background-color: #696969;">

	<?php 
	include_once('inc/connection.php'); 
	#include_once('inc/func.php');
 ?>
 <?php #checkDetails(); 
 						/*if(isset($_GET['u'])){
 							$user = $_GET['u'];
 							$query = "UPDATE users SET status = 0 WHERE id = $user";
 							mysqli_query($con, $query);
 							
 							header('Location: index.php');
 						}*/
 if (isset($_POST['submit'])){
			 $errors = 0;

		
			if (!isset($_POST['UserName'])||!isset($_POST['UserPassword'])) {
				$errors = 1;
			}
			if ($errors == 0) {
				# code...
				$UserName = $_POST['UserName'];
				$Password = $_POST['UserPassword'];

				$query = "SELECT * FROM user WHERE UserID = '{$UserName}' AND Password = '{$Password}'";

				$result_set = mysqli_query($con, $query);

				if ($result_set) {
					
					if (mysqli_num_rows($result_set)==1) {
						
						//$query2 = "SELECT * FROM users WHERE UserName = '{$UserName}' AND Password = '{$Password}'";
						//$res = mysqli_query($con, $query2);
						$loggedDet = mysqli_fetch_assoc($result_set);
						//$query3 = "INSERT INTO loggeduser (id, loggedUID) VALUES ('{$loggedDet[id]}', 1)";
						//$query3 = "UPDATE users SET status = 1 WHERE id = $loggedDet[id]";
						//echo "$query3";
						$_SESSION['UserID'] = $loggedDet['UserID'];
						//mysqli_query($con, $query3);
						
						header("Location: home.php");
					}
					else{
						$errors = 1;
					}
				}
			}
		}
		else{
			$errors=0;
		}
 ?>
	<div class="signup" style="float: right; margin-top: -90px;">
		<a class="signup" style="border-radius: 10px; padding: 5px; color: white;" href="index.php">< Go back to <span style="color:#990000; font-weight: bold; "> Train Schedule</span></a>		
	</div>
	<div class="login"> 		
		<form action='login.php' method="post"> 
			<fieldset> 
				<legend><h1>Log In</h1></legend>
				<!--<p class="error">Invalid User Name or Password.!</p>-->
				<?php if ($errors==1) {
					# code...
					#echo $errors;
					echo ('<p class="error">Invalid User Name or Password.!</p>');
					
				} ?>
				<p>User Name : 
				<input type="text" name="UserName" placeholder="User Name">
				</p>
				<p>Password : 
					<input type="Password" name="UserPassword" placeholder="Password">
				</p>
				<p> 
					<button style="border-radius: 10px; padding: 5px;" type="submit" name="submit">Log In</button>
				</p>
				
			</fieldset>
		</form>
		
	</div>
<?php include("inc/footer.php"); ?>
</body>

</html>