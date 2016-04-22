<?php
//employeeLogin.php

require_once 'global.inc.php';

$error = "";
$employeeID = "";

//check to see if they've submitted the login form
if(isset($_POST['submit-login'])) {

	$employeeID = $_POST['employeeID'];

	$userTools = new UserTools();
	if($userTools->employeeLogin($employeeID)){
		//successful login, redirect them to a page
		header("Location: employeeAction.php");
	}else{
		$error = "Incorrect Employee ID. Please try again.";
	}
}
?>

<html>
<head>
<title>Login</title>
</head>
<body>
<?php
if($error != "")
{
	echo $error."<br/>";
}
?>
<form action="employeeLogin.php" method="post">
Employee ID: <input type="text" name="employeeID" value="<?php echo $employeeID; ?>" /><br/>
<input type="submit" value="Login" name="submit-login" />
</form>
</body>
</html>