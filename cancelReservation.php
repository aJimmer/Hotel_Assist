<?php
//cacelReservation.php

require_once 'global.inc.php';
session_start();
$reservation_no = "";

if(isset($_POST['submit-form'])) {

	//retrieve the $_POST variable
	$reservation_no = $_POST['reservation_no'];		

	//obtain room_no and hotel_id through query
	$result = mysql_query("SELECT room_no, hotel_id FROM reservation where reservation_no = '$reservation_no'");
	$result = mysql_fetch_assoc($result);
	$room_no = $result[room_no];
	$hotel_id = $result[hotel_id];

	//query to delete and check if successful
	$result = mysql_query("DELETE FROM  reservation where reservation_no = '$reservation_no'");
	if ($result) {
		$result = mysql_query("UPDATE room SET status='available' WHERE room_no = '$room_no' and hotel_id = '$hotel_id'");	
		header("Location: guest.php");
	}
	else {
		print("Error canceling the reservation.");
	}
}

?>
<html>
<head>
<title>Available Rooms</title>
<meta charset="utf-8">
<link href="casita.css" rel="stylesheet">
</head>
	<body>
	<?php echo ($error != "") ? $error : ""; ?>
		<div id="wrapper">		
		<form action="cancelReservation.php" method="post">
			Reservation Number: <input type="text" value="<?php echo $reservation_no; ?>" name="reservation_no" /><br/>
		<input type="submit" value="Submit" name="submit-form" />
	
		</form>
		</div>
	</body>
</html>
