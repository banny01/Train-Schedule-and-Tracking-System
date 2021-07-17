<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BANNY ENcrypt - Sign Up</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body style="background-color: #696969;">
<?php 
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

        if (mysqli_num_rows($result_set) > 0) {
            $errors = 1;
        }
        if ($errors == 0) {             

            $query2 = "INSERT INTO users (Name, IDNo, Gender, Location, UserName, Password) VALUES ('{$Name}', '{$NIC}', '{$Gender}', '{$Address}', '{$UserName}', '{$Password}')";

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
<div class="signup" style="float: right; margin-top: -90px;">
	<a class="signup" style="border-radius: 10px; padding: 5px; color: white;" href="index.php">Login to an account</a>		
</div>
<div class="login"> 
		
		<form action='#' method="post"> 
			<fieldset> 
				<legend><h1>Sign Up</h1></legend>
				<!--<p class="error">Invalid User Name or Password.!</p>-->
				<?php 
                if ($errors==1) {                    
					echo ('<p class="error">User Name Already Exists.!</p>');					
				}
                else if($errors==2){
                    echo ('<p class="done">You are signed up.</p>');
                }
                ?>
                <table class="Singuptbl">
                    <tr style="height: 30px; ">
                        <td style="width: 90px;">Name <i style="color: red;">*</i></td>
                        <td>:</td>
                        <td><input style="width: 200px;" type="text" name="Name" placeholder="Name" size="50" required></td>                       
                    </tr>
                    <tr style="height: 30px;">
                        <td>NIC No <i style="color: red;">*</i></td>
                        <td>:</td>
                        <td><input style="width: 200px;" type="text" name="NIC" placeholder="NIC no" required></td>                       
                    </tr>
                    <tr style="height: 30px;">
                        <td>Address</td>
                        <td>:</td>
                        <td><input style="width: 200px;" type="text" name="Address" placeholder="Address" size="50"></td>                       
                    </tr>
                    <tr style="height: 30px;">
                        <td>Gender <i style="color: red;">*</i></td>
                        <td>:</td>
                        <td><select name="Gender" id="Gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>  
                            </select></td>                       
                    </tr>
                    <tr style="height: 30px;">
                        <td>User Name <i style="color: red;">*</i></td>
                        <td>:</td>
                        <td><input style="width: 200px;" type="text" name="UserName" placeholder="User Name" required></td>                       
                    </tr>
                    <tr style="height: 30px;">
                        <td>Password <i style="color: red;">*</i></td>
                        <td>:</td>
                        <td><input style="width: 200px;" type="Password" name="UserPassword" placeholder="Password" required></td>                       
                    </tr>
                </table>
				<p> 
					<button style="border-radius: 10px; padding: 5px;" type="submit" name="submit">Sign Up</button>
				</p>
				
			</fieldset>
		</form>
		
	</div>
    <?php include("inc/footer.php"); ?>
</body>
</html>