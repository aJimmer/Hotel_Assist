<?php
//Employee.class.php

require_once 'Db.class.php';

/**variables need to be updated according to attributes in tables**/


class Employee {

	public $employee_id;
	public $name;
	public $address;
	public $phone;
	public $hotel_id;

	//Constructor is called whenever a new object is created.
	//Takes an associative array with the DB row as an argument.
	function __construct($data) {
		$this->employee_id = (isset($data['employee_id'])) ? $data['employee_id'] : "";
		$this->name = (isset($data['name'])) ? $data['name'] : "";
		$this->address= (isset($data['address'])) ? $data['address'] : "";
		$this->phone = (isset($data['phone'])) ? $data['phone'] : "";
		$this->hotel_id = (isset($data['hotel_id'])) ? $data['hotel_id'] : "";
	}

	public function save($isNewUser = false) {
		//create a new database object.
		$db = new DB();

		//if the user is already registered and we're
		//just updating their info.
		if(!$isNewUser) {
			//set the data array
			$data = array(
					"employee_id" => "'$this->employee_id'",
					"name" => "'$this->name'",
					"address" => "'$this->address'",
					"phone" => "'$this->phone'",
					"hotel_id" => "'$this->hotel_id'",
			);
				
			//update the row in the database
			$db->update($data, 'project.employee', 'employee_id = '.$this->employee_id);
		}else {
			//if the user is being registered for the first time.
			$data = array(
					"employee_id" => "'$this->employee_id'",
					"name" => "'$this->name'",
					"address" => "'$this->address'",
					"phone" => "'$this->phone'",
					"hotel_id" => "'$this->hotel_id'",
				);
				
			$this->employee_id = $db->insert($data, 'project.employee');
		
		}
		return true;
	}

}

?>