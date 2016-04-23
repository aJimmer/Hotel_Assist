<?php
//logout.php
require_once 'global.inc.php';

$userTools = new UserTools();
$userTools->employeeLogout();

header("Location: index.php");

?>