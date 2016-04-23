<?php
//UserTools.class.php
require_once 'global.inc.php';
require_once 'User.class.php';
require_once 'Db.class.php';
require_once 'Employee.class.php';

class UserTools {

	//Log the user in. First checks to see if the
	//username and password match a row in the database.
	//If it is successful, set the session variables
	//and store the user object within.
	
	public function login($username, $password)
	{

		$hashedPassword = md5($password);
		$result = mysql_query("SELECT * FROM project.user WHERE username = '$username' AND password = '$password'");

		if(mysql_num_rows($result) == 1)
		{
			$_SESSION['user'] = serialize(new User(mysql_fetch_assoc($result)));
			$_SESSION['login_time'] = time();
			$_SESSION['logged_in'] = 1;
			return true;
		}else{
			return false;
		}
	}

	public function employeeLogin($employee_id)
	{
		$result = mysql_query("SELECT * FROM project.employee WHERE employee_id = '$employee_id'");
	
		if(mysql_num_rows($result) == 1)
		{
			$_SESSION['employee'] = serialize(new Employee(mysql_fetch_assoc($result)));
			$_SESSION['login_time'] = time();
			$_SESSION['logged_in'] = 1;
			return true;
		}else{
			return false;
		}
	}
	
	//Log the user out. Destroy the session variables.
	public function logout() {
		unset($_SESSION['user']);
		unset($_SESSION['login_time']);
		unset($_SESSION['logged_in']);
		session_destroy();
	}
	
	public function employeeLogout() {
		unset($_SESSION['employee']);
		unset($_SESSION['login_time']);
		unset($_SESSION['logged_in']);
		session_destroy();
	}
	

	//Check to see if a username exists.
	//This is called during registration to make sure all user names are unique.
	public function checkUsernameExists($username) {
		$result = mysql_query("SELECT username FROM project.user WHERE username = '$username'");
		if(mysql_num_rows($result) == 0)
		{
			return false;
		}else{
			return true;
		}
	}
	
	
	public function checkEmployeeIdExists($employee_id) {
		$result = mysql_query("SELECT employee_id FROM project.employee WHERE employee_id = '$employee_id'");
		if(mysql_num_rows($result) == 0)
		{
			return false;
		}else{
			return true;
		}
	}

	//get a user
	//returns a User object. Takes the users id as an input
	public function getUser($username)
	{
		$db = new DB();
		$result = $db->select('project.user', "username = '$username'");

		return new User($result);
	}
	
	public function getEmployee($employeeID)
	{
		$db = new DB();
		$result = $db->select('project.employee', "employee_id = '$employeeID'");
	
		return new Employee($result);
	}

}
?>