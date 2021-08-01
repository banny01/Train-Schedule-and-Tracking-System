	<?php 
		include_once('inc/connection.php');
		date_default_timezone_set("Asia/Colombo");
		$today = date("Y-m-d");
		
		if (isset($_SESSION['UserID'])) {
			# code...
			$loggedDet = $_SESSION['UserID'];
			$query2 = "SELECT * FROM user WHERE UserID = '$loggedDet'";
			$res2 = mysqli_query($con, $query2);
			$loggeduser = mysqli_fetch_assoc($res2);
			
		}
		else
			header('Location: index.php');
		 ?>
	
	<div class="header">
		<div >		
			<p class="greeting">Welcome <?php echo "$loggeduser[Name]" ?> !</p> 		
		</div>
	
		<div style="margin-top: 7px;">		
			<ul class="logout" > 
				<div class="dropdown">
  					<button class="dropbtn">Menu</button>
  					<div class="dropdown-content" >
    					<a href="home.php" style="width: 100%;">Home</a>
						<a href="account.php" style="width: 100%;">Account</a>
						<!--<a href="addDelay.php" style="width: 100%;">Add Delay</a>-->
						<?php if($loggeduser['Role'] == "Admin"){ ?>
							<a href="trains.php" style="width: 100%;">Add Train</a>
							<a href="signup.php" style="width: 100%;">Add User</a>
						<?php } ?>
    					<a href="logout.php" style="width: 100%;">Log out</a>
  					</div>
		<!--</div>
			<li><a href="logout.php">Log out</a></li> 
		</ul>
		<ul class="logout"> 
			<li><a href="about.php">About Us</a></li>
		</ul>
		<ul class="logout"> 
			<li><a href="home.php">Home</a></li> -->
			</ul>

				</div>
		</div>
	</div>
	