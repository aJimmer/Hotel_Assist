<?php
//logout.php
require_once 'global.inc.php';

$userTools = new UserTools();
$userTools->logout();

header("Location: index.php");

?>