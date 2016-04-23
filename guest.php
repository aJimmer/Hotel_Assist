<?php
//guest.php

require_once 'global.inc.php';
?>

<html lang="en">
<head>
<title>Guest Homepage</title>
<meta charset="utf-8">
<link href="casita.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
</script>
<![endif]-->
</head>
<body>
<div id="wrapper">
<?php if(isset($_SESSION['logged_in'])) : ?>
<?php $user = unserialize($_SESSION['user']); ?>
Hello, <?php echo $user->username ?>. You are logged in. <a
href="logout.php">Logout</a> | <a href="settings.php">Change Email</a>

What would you like to do?
<br/>
  <ul>
    <li><a href="comingSoon.php">Make A Reservation</a></li>
    <li><a href="comingSoon.php">Request Facilities or Services</a></li>
    <li><a href="comingSoon.php">Pay your bill</a><br/></li>
  </ul>

<?php else : ?>
You are not logged in. <a href="login.php">Log In</a> | <a
href="register.php">Register</a>
<?php endif; ?>
</div>
</body>
</html>