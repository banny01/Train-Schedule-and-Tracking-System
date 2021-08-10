
<?php 
	function getStation($sID, $con){
		$sName = "";
		$query = "SELECT * FROM station WHERE ID = $sID";
		$res = mysqli_query($con, $query);
		$row = mysqli_fetch_assoc($res);
		$sName = $row['Name'];
		return $sName;
	}
 ?>