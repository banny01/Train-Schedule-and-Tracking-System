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
    <title>Train Management - Add Account</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body style="background-color: #696969;">
<?php 
	include_once('inc/connection.php');
    include_once("inc/header.php");
    $errors = 0;
    $query1 = "SELECT * FROM station";
    $res = mysqli_query($con, $query1);

    if (isset($_POST['submit'])){
        
        $UserName = $_POST['UserName'];
        $Name = $_POST['Name'];
        $Station = $_POST['Station'];
        $Password = $_POST['UserPassword'];
        $Role = $_POST['Role'];
        $query = "SELECT * FROM user WHERE UserID = '{$UserName}'";
        $result_set = mysqli_query($con, $query);

        if (mysqli_num_rows($result_set) > 0) {
            $errors = 1;
        }
        if ($errors == 0) {             

            $query2 = "INSERT INTO user VALUES ('{$UserName}', '{$Name}', '{$Password}', '{$Role}', '{$Station}')";
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

<div class="login"> 
		
		<form action='#' method="post"> 
			<fieldset> 
				<legend><h1>Create an account</h1></legend>
				<!--<p class="error">Invalid User Name or Password.!</p>-->
				<?php 
                if ($errors==1) {                    
					echo ('<p class="error">User Name Already Exists.!</p>');					
				}
                else if($errors==2){
                    echo ('<p class="done">Account added succesfully.!</p>');
                }
                ?>
                <table class="Singuptbl">
                    <tr style="height: 30px; ">
                        <td style="width: 90px;">Name <i style="color: red;">*</i></td>
                        <td>:</td>
                        <td><input style="width: 200px;" type="text" name="Name" placeholder="Name" size="50" required></td>                       
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
                    
                    <tr style="height: 30px;">
                        <td>Role <i style="color: red;">*</i></td>
                        <td>:</td>
                        <td><select name="Role" id="Role" required>
                                <option value="Admin">Admin</option>
                                <option value="SM">Station Master</option>
                            </select></td>                       
                    </tr>
                    
                    <tr style="height: 30px;">
                        <td>Station <i style="color: red;">*</i></td>
                        <td>:</td>
                        <td><select name="Station" id="Station" required>                        
                            <?php while($station = mysqli_fetch_assoc($res)){ 
                                echo "<option value=".$station['ID'].">";
						        echo $station['Name'];
						        echo "</option>"; 
                        } ?>
                            </select></td>                       
                    </tr>
                </table>
				<p> 
					<button style="border-radius: 10px; padding: 5px;" type="submit" name="submit">Add User</button>
				</p>
				
			</fieldset>
		</form>
		
	</div>
    <?php include("inc/footer.php"); ?>
</body>
</html>