<?php
//login.php

require_once 'global.inc.php';

$error = "";
$username = "";
$password = "";

//check to see if they've submitted the login form
if(isset($_POST['submit-login'])) {

	$username = $_POST['username'];
	$guestid = $username;
	$password = $_POST['password'];

	$userTools = new UserTools();
	if($userTools->login($username, $password)){
		//successful login, redirect them to a page
		header("Location: guest.php");
	}else{
		$error = "Incorrect username or password. Please try again.";
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
<div id=wrapper>
<form action="login.php" method="post">

Username: <input type="text" name="username" value="<?php echo $username; ?>" /><br/>
Password: <input type="password" name="password" value="<?php echo $password; ?>" /><br/>
<input type="submit" value="Login" name="submit-login" />

</form>
</div>
</body>
</html>
