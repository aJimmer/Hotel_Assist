<?php
//employeeLogin.php

require_once 'global.inc.php';

$error = "";
$employee_id= "";

//check to see if they've submitted the login form
if(isset($_POST['submit-login'])) {

	$employee_id = $_POST['employee_id'];

	$userTools = new UserTools();
	if($userTools->employeeLogin($employee_id)){
		//successful login, redirect them to a page
		header("Location: employee.php");
	}else{
		$error = "Incorrect Employee ID. Please try again.";
	}
}
?>

<html>
<head>
<title>Login</title>
<meta charset="utf-8">
<link href="casita.css" rel="stylesheet">
</head>
<body>

<?php
if($error != "")
{
	echo $error."<br/>";
}
?>
<div id="wrapper">
<form action="employeeLogin.php" method="post">
Employee ID: <input type="text" name="employee_id" value="<?php echo $employee_id; ?>" /><br/>
<input type="submit" value="Login" name="submit-login" />
</form>
</div>
</body>
</html>