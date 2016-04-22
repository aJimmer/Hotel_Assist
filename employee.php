<?php
//employee.php

require_once 'global.inc.php';
?>

<html>
<head>
<title>Homepage</title>
</head><body>

<?php if(isset($_SESSION['logged_in'])) : ?>
<?php $user = unserialize($_SESSION['Employee']); ?>
Hello, <?php echo $user->name; ?>. You are logged in. <a href="logout.php">Logout</a> | <a href="settings.php">Change Email</a>
<?php else : ?>
You are not logged in. <a href="employeeLogin.php">Employee Login</a> | <a href="registerEmployee.php">Employee Registration</a>
<?php endif; ?>

</body>
</html>
