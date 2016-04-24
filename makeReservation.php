<?php

require_once 'global.inc.php';

$guest_id = "";
$start_date = "";
$end_date = "";
$room_no = "";
$hotel_id = "";

if(isset($_POST['submit-form'])) {

	//retrieve the $_POST variables
	$guest_id = $_POST['guest_id'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$room_no = $_POST['room_no'];
	$hotel_id = $_POST['hotel_id'];		
	$userTool = new UserTools();
	
	if($start_date == "" || $guest_id == ""  || $end_date = "" || room_no == "" || hotel_id == "") {
		print("Please fill all fields.");		
	}
	else if(! $userTool->checkRoomAvailable($room_no,$hotel_id)){
		print("The room is already taken.");	
	}
	else {
		$result = mysql_query("INSERT INTO reservation(guest_id, start_date, end_date, room_no, hotel_id) values ($guest_id,'$start_date','$end_date','$room_no','$hotel_id')");
		if (! $result) {
			echo "Failed to create a reservation.";
		}
		else {
			$result = mysql_query("UPDATE room SET status='unavailable' WHERE room_no = '$room_no' and hotel_id = $hotel_id");	
			header("Location: guest.php");
		}
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
		<form action="makeReservation.php" method="post">
	
			Guest Id: <input type = "text" value="<?php echo $guest_id; ?>" name= "guest_id" /><br/>
			Start Date: <input type="text" value="<?php echo $start_date; ?>" name="start_date" /><br/>
			End Date: <input type="text" value="<?php echo $end_date; ?>" name="end_date" /><br/>
			Room No: <input type="text" value="<?php echo $room_no; ?>" name="room_no" /><br/>
			Hotel ID: <input type="text" value="<?php echo $hotel_id; ?>" name="hotel_id" /><br/>
		<input type="submit" value="Register" name="submit-form" />
	
		</form>
		</div>
	</body>
</html>
