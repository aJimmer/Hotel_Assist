<?php

require_once 'global.inc.php';

//initialize php variables used in the form
$employeeID = "";
$name = "";
$address = "";
$phone = "";
$type = "";
$department = "";
$gender = "";
$error = "";

//check to see that the form has been submitted
if(isset($_POST['submit-form'])) { 

	//retrieve the $_POST variables
	$employeeID = $_POST['EmployeeID'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$type = $_POST['type'];
	$department = $_POST['department'];
	$gender = $_POST['gender'];

	//initialize variables for form validation
	$success = true;
	$userTools = new UserTools();

	//validate that the form was filled out correctly
	//check to see if user name already exists
	if($userTools->checkEmployeeIdExists($employeeID))
	{
	    $error .= "That ID is already taken.<br/> \n\r";
	    $success = false;
	}

	if($success)
	{
	    //prep the data for saving in a new user object
	    $data['EmployeeID'] = $employeeID;
	    $data['name'] = $name;
	    $data['address'] = $address;
	    $data['phone'] = $phone;
	    $data['type'] = $type;
	    $data['department'] = $department;
	    $data['gender'] = $gender;

	    //create the new user object
	    $newEmployee = new Employee($data);

	    //save the new user to the database
	    $newUser->save(true);

	    //log them in
	    $userTools->employeeLogin($employeeID);

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
	
			Employee ID: <input type="text" value="<?php echo $employeeID; ?>" name="username" /><br/>
			Name: <input type="text" value="<?php echo $name; ?>" name="name" /><br/>
			Address: <input type="text" value="<?php echo $address; ?>" name="address" /><br/>
			Type (PT or FT): <input type="text" value="<?php echo $type; ?>" name="type" /><br/>
			Department: <input type="text" value="<?php echo $department;?>" name="department" /><br/>
			Phone: <input type="text" value="<?php echo $phone?>" name="phone" /><br/>
			Gender: <input type="text" value="<?php echo $gender?>" name="gender"/><br/>
		<input type="submit" value="Register" name="submit-form" />
	
		</form>
	</body>
</html>