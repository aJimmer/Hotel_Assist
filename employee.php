<?php
//employee.php

require_once 'global.inc.php';
?>

<html>
<head>
<title>Homepage</title>
<meta charset="utf-8">
<link href="casita.css" rel="stylesheet">
</head><body>
<div id="wrapper">
<?php if(isset($_SESSION['logged_in'])) : ?>
<?php $employee = unserialize($_SESSION['employee']); ?>
Hello, <?php echo $employee->name; ?>. You are logged in. <a href="employeeLogout.php">Logout</a> | <a href="settings.php">Change Email</a>

What would you like to do?
<br/>
  <ul>
    <li><a href="comingSoon.php">Add a Guest</a></li>
    <li><a href="comingSoon.php">Accept a payment</a><br/></li>
  </ul>

<?php else : ?>
You are not logged in. <a href="employeeLogin.php">Employee Login</a> | <a href="registerEmployee.php">Employee Registration</a>
<?php endif; ?>
</div>
</body>
</html>
