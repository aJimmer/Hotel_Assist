<?php

require_once 'global.inc.php';

//initialize php variables used in the form
$employee_id = "";
$name = "";
$address = "";
$phone = "";
$hotel_id = "";
$error = "";

//check to see that the form has been submitted
if(isset($_POST['submit-form'])) { 

	//retrieve the $_POST variables
	$employee_id = $_POST['employee_id'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$hotel_id = $_POST['hotel_id'];

	//initialize variables for form validation
	$success = true;
	$userTools = new UserTools();

	//validate that the form was filled out correctly
	//check to see if user name already exists
	if($userTools->checkEmployeeIdExists($employee_id))
	{
	    $error .= "That ID is already taken.<br/> \n\r";
	    $success = false;
	}

	if($success)
	{
	    //prep the data for saving in a new user object
	    $data['employee_id'] = $employee_id;
	    $data['name'] = $name;
	    $data['address'] = $address;
	    $data['phone'] = $phone;
		$data['hotel_id'] = $hotel_id;

	    //create the new user object
	    $newEmployee = new Employee($data);

	    //save the new user to the database
	    $newEmployee->save(true);

	    //log them in
	    $userTools->employeeLogin($employee_id);

	    //redirect them to a guest page
	    header("Location: employee.php");

	}

}

//If the form wasn't submitted, or didn't validate
//then we show the registration form again
?>
<html>
	<head>
		<title>Registration</title>
	</head>
	
	<body>
		<?php echo ($error != "") ? $error : ""; ?>
		<form action="registerEmployee.php" method="post">
	
			Employee ID: <input type="text" value="<?php echo $employee_id; ?>" name="username" /><br/>
			Name: <input type="text" value="<?php echo $name; ?>" name="name" /><br/>
			Address: <input type="text" value="<?php echo $address; ?>" name="address" /><br/>
			Phone: <input type="text" value="<?php echo $phone?>" name="phone" /><br/>
			Hotel ID: <input type="text" value="<?php echo $hotel_id; ?>" name="type" /><br/>
		<input type="submit" value="Register" name="submit-form" />
	
		</form>
	</body>
</html>