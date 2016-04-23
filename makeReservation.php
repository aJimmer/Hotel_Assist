<?php

require_once 'global.inc.php';

$reservation_no = "";
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
	
	//initialize variables for form validation
	$success = true;
	$userTools = new UserTools();

	//validate that the form was filled out correctly



	//check to see if passwords match
	if($password != $password_confirm) {
		$error .= "Passwords do not match.<br/> \n\r";
		$success = false;
	}

	if($success)
	{
		//prep the data for saving in a new user object
		$data['guest_id'] = $guest_id;
		$data['username'] = $username;
		$data['password'] = $password; //encrypt the password for storage
		$data['email'] = $email;

		//create the new user object
		$newUser = new User($data);

		//save the new user to the database
		$newUser->save(true);

		//log them in
		$userTools->login($username, $password);

		//redirect them to a guest page
		header("Location: guest.php");

	}

}





?>
<html>
<head>
<title>Reservation</title>
</head>

<body>
<?php echo ($error != "") ? $error : ""; ?>
		<form action="makeReservation.php" method="post">
	
			Guest Id: <input type = "text" value="<?php echo $guest_id; ?>" name= "guest_id" /><br/>
			Start Date: <input type="text" value="<?php echo $start_date; ?>" name="start_date" /><br/>
			End Date: <input type="text" value="<?php echo $end_date; ?>" name="end_date" /><br/>
			
		<input type="submit" value="Register" name="submit-form" />
	
		</form>
	</body>
</html>