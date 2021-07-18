<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Management - Account</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body style="background-color: #696969;">
<?php 
    include_once("inc/header.php");
	include_once('inc/connection.php'); 
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
				<legend><h1>Account Details</h1></legend>
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
                        <td style="width: 90px;">Name <i style="color: red;">*</i></td>
                        <td>:</td>
                        <td><input style="width: 200px;" type="text" name="Name" placeholder="Name" size="50"  value="<?php echo "$loggeduser[Name]" ?>" required></td>                       
                    </tr>
                    
                    <tr style="height: 30px;">
                        <td>User Name <i style="color: red;">*</i></td>
                        <td>:</td>
                        <td><input style="width: 200px; background-color: #cfcfcf;" type="text" name="UserName" placeholder="User Name" value="<?php echo "$loggeduser[UserID]" ?>" readonly required></td>                       
                    </tr>
                    <tr style="height: 30px;">
                        <td>Password <i style="color: red;">*</i></td>
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