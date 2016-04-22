<?php
//Employee.class.php

require_once 'DB.class.php';


class Employee {

	public $employeeID;
	public $name;
	public $address;
	public $phone;
	public $type;
	public $department;
	public $gender;

	//Constructor is called whenever a new object is created.
	//Takes an associative array with the DB row as an argument.
	function __construct($data) {
		$this->employeeID = (isset($data['employeeID'])) ? $data['employeeID'] : "";
		$this->name = (isset($data['name'])) ? $data['name'] : "";
		$this->address= (isset($data['address'])) ? $data['address'] : "";
		$this->phone = (isset($data['phone'])) ? $data['phone'] : "";
		$this->type = (isset($data['type'])) ? $data['type'] : "";
		$this->department = (isset($data['department'])) ? $data['department'] : "";
		$this->gender = (isset($data['gender'])) ? $data['gender'] : "";
		
	}

	public function save($isNewUser = false) {
		//create a new database object.
		$db = new DB();

		//if the user is already registered and we're
		//just updating their info.
		if(!$isNewUser) {
			//set the data array
			$data = array(
					"employeeID" => "'$this->employeeID'",
					"name" => "'$this->name'",
					"address" => "'$this->address'",
					"phone" => "'$this->phone'",
					"type" => "'$this->type'",
					"department" => "'$this->department'",
					"gender" => "'$this->gender'",
			);
				
			//update the row in the database
			$db->update($data, 'Employee', 'EmployeeID = '.$this->employeeID);
		}else {
			//if the user is being registered for the first time.
			$data = array(
				"employeeID" => "'$this->employeeID'",
					"name" => "'$this->name'",
					"address" => "'$this->address'",
					"phone" => "'$this->phone'",
					"type" => "'$this->type'",
					"department" => "'$this->department'",
					"gender" => "'$this->gender'",
					//"join_date" => "'".date("Y-m-d H:i:s",time())."'"
							);
				
			$this->employeeID = $db->insert($data, 'Employee');
			//$this->joinDate = time();
		}
		return true;
	}

}

?>