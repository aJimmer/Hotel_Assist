<?php

require_once 'User.class.php';
require_once 'Employee.class.php';
require_once 'UserTools.class.php';
require_once 'Db.class.php';

//connect to the database
$db = new DB();
$db->connect();

//initialize UserTools object
$userTools = new UserTools();

//start the session
session_start();

//refresh session variables if logged in
if(isset($_SESSION['logged_in'])) {
	
	$user = unserialize($_SESSION['user']);
	$_SESSION['user'] = serialize($userTools->getUser($user->username));
	
	$employee = unserialize($_SESSION['employee']);
	$_SESSION['employee'] = serialize($userTools->getEmployee($employee->employee_id));
}
?>