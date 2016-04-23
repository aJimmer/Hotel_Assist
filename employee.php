<?php
//employee.php

require_once 'global.inc.php';
?>

<html>
<head>
<title>Homepage</title>
</head><body>

<?php if(isset($_SESSION['logged_in'])) : ?>
<?php $employee = unserialize($_SESSION['employee']); ?>
Hello, <?php echo $employee->name; ?>. You are logged in. <a href="employeeLogout.php">Logout</a> | <a href="settings.php">Change Email</a>
<?php else : ?>
You are not logged in. <a href="employeeLogin.php">Employee Login</a> | <a href="registerEmployee.php">Employee Registration</a>
<?php endif; ?>

</body>
</html>
