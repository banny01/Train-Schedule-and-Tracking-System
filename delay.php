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
    $errors = 0;

    if (isset($_POST['submit'])){
        
        $UserName = $_POST['UserName'];
        $Name = $_POST['Name'];
        $NIC = $_POST['NIC'];
        $Password = $_POST['UserPassword'];
        $Gender = $_POST['Gender'];
        $Address = $_POST['Address'];
        $query = "SELECT * FROM users WHERE UserName = '{$UserName}'";
        $result_set = mysqli_query($con, $query);

        if ($errors == 0) {             

            $query2 = "UPDATE users SET  Name = '{$Name}', IDNo = '{$NIC}', Gender = '{$Gender}', Location = '{$Address}', Password = '{$Password}' WHERE UserName =  '{$UserName}'";

            $result_set2 = mysqli_query($con, $query2);
            
            if ($result_set2) {
                $errors = 2;               
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
                else if($errors==2){
                    echo ('<p class="done">Updated Successfully.</p>');
                }
                ?>
                <table class="Singuptbl">
                    <tr style="height: 30px; ">
                        <td style="width: 90px; color: white;">Name <i style="color: red;">*</i></td>
                        <td>:</td>
                        <td><input style="width: 200px;" type="text" name="Name" placeholder="Name" size="50"  value="<?php echo "$loggeduser[Name]" ?>" required></td>                       
                    </tr>                    
                    <tr style="height: 30px;">
                        <td style="width: 90px; color: white;">User Name <i style="color: red;">*</i></td>
                        <td>:</td>
                        <td><input style="width: 200px; background-color: #cfcfcf;" type="text" name="UserName" placeholder="User Name" value="<?php echo "$loggeduser[UserID]" ?>" readonly required></td>                       
                    </tr>
                    <tr style="height: 30px;">
                        <td style="width: 90px; color: white;">Password <i style="color: red;">*</i></td>
                        <td>:</td>
                        <td><input style="width: 200px;" type="Password" name="UserPassword" placeholder="Password" required></td>                       
                    </tr>
                </table>
				<p> 
					<button style="border-radius: 10px; padding: 5px;" type="submit" name="submit">Update</button>
				</p>
				
			</fieldset>
		</form>
		
	</div>

	<?php include("inc/footer.php"); ?>

</body>

</html>