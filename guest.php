<?php
//guest.php

require_once 'global.inc.php';
?>

<html>
<head>
<title>Homepage</title>
</head><body>

<?php if(isset($_SESSION['logged_in'])) : ?>
<?php $user = unserialize($_SESSION['user']); ?>
Hello, <?php echo $user->username; ?>. You are logged in. <a href="logout.php">Logout</a> | <a href="settings.php">Change Email</a>

What would you like to do?
<br/>
<a href="">Make A Reservation</a> <br/>
<a href="">Request Facilities or Services</a><br/>
<a href="">Pay your bill</a><br/>
<a href="">Make A Reservation</a><br/>

<?php else : ?>
You are not logged in. <a href="login.php">Log In</a> | <a href="register.php">Register</a>
<?php endif; ?>

</body>
</html>