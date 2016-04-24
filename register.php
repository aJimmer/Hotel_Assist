<?php

require_once 'global.inc.php';

//initialize php variables used in the form
$guest_id = "";
$username = "";
$password = "";
$password_confirm = "";
$email = "";
$error = "";

//check to see that the form has been submitted
if(isset($_POST['submit-form'])) { 

	//retrieve the $_POST variables
	$guest_id = $_POST['guest_id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_confirm = $_POST['password-confirm'];
	$email = $_POST['email'];

	//initialize variables for form validation
	$success = true;
	$userTools = new UserTools();

	//validate that the form was filled out correctly
	//check to see if user name already exists
	if($userTools->checkUsernameExists($username))
	{
	    $error .= "That username is already taken.<br/> \n\r";
	    $success = false;
	}

	if($userTools->checkGuestIdExists($guest_id))
	{
		$error .= "Account exists for that Guest ID.";
		$success = false;
	}

	//check to see if passwords match
	if($password != $password_confirm) {
	    $error .= "Passwords do not match.<br/> \n\r";
	    $success = false;
	}

	if($success)
	{
	    //save the new user to the database
	    $result = $result = mysql_query("INSERT INTO user(guest_id, username, password, email) VALUES ('$guest_id','$username', '$password', '$email')");
	    if($result){
		    //log them in
		    $userTools->login($username, $password);
		    //redirect them to a guest page
		    header("Location: guest.php");
	    }
	    else {
		print("Error Creating User.");
	    }
	}

}

//If the form wasn't submitted, or didn't validate
//then we show the registration form again
?>
<html>
	<head>
		<title>Registration</title>
		<meta charset="utf-8">
<link href="casita.css" rel="stylesheet">
	</head>
	
	<body>
		<?php echo ($error != "") ? $error : ""; ?>
		<div id= "wrapper">
		<form action="register.php" method="post">
	
			Guest ID: <input type="text" value="<?php echo $guest_id; ?>" name="guest_id" /><br/>
			Username: <input type="text" value="<?php echo $username; ?>" name="username" /><br/>
			Password: <input type="password" value="<?php echo $password; ?>" name="password" /><br/>
			Password (confirm): <input type="password" value="<?php echo $password_confirm; ?>" name="password-confirm" /><br/>
			E-Mail: <input type="text" value="<?php echo $email; ?>" name="email" /><br/>
		<input type="submit" value="Register" name="submit-form" />
		</form>
		</div>
	</body>
</html>
