<?php
	include_once('inc/connection.php');
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="refresh" content="1800;url=logout.php" />
	<title>Train Schedule and Tracking - Search</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
</head>

<?php
    if (isset($_POST['submit'])){
        date_default_timezone_set("Asia/Colombo");
        //$DateTime = getdate();
        $From = $_POST['From'];
        $To = $_POST['To'];
        $Date = strtotime($_POST['Date']);
        $Time = $_POST['Time'];
        
        if($Date==""){
            $Date = date("l");
        }
        else if($Date!=""){
            $Date = date('l', $Date);
        }
        if($Time==""){
            $Time = date("H:i");
        }

    }
?>

<body>
    <div class="signup" style="float: right; margin-top: -0px;">
		<a class="signup" style="border-radius: 10px; padding: 5px; color: white;" href="index.php">< Go back to <span style="color:#990000; font-weight: bold; "> Train Schedule</span></a>		
	</div>
	<div style="color: white;">
        <?php
            echo $From,$To,$Date,$Time;
        ?>
    </div>
	<?php include("inc/footer.php"); ?>

</body>

</html>