<?php
//User.class.php

require_once 'Db.class.php';


class User {

	public $guest_id;
	public $username;
	public $hashedPassword;
	public $email;

	//Constructor is called whenever a new object is created.
	//Takes an associative array with the DB row as an argument.
	function __construct($data) {
		$this->guest_id = (isset($data['guest_id'])) ? $data['guest_id'] : "";
		$this->username = (isset($data['username'])) ? $data['username'] : "";
		$this->hashedPassword = (isset($data['password'])) ? $data['password'] : "";
		$this->email = (isset($data['email'])) ? $data['email'] : "";
	}

	public function save($isNewUser = false) {
		//create a new database object.
		$db = new DB();

		//if the user is already registered and we're
		//just updating their info.
		if(!$isNewUser) {
			//set the data array
			$data = array(
		
					"username" => "'$this->username'",
					"password" => "'$this->hashedPassword'",
					"email" => "'$this->email'"
			);
				
			//update the row in the database
			$db->update($data, 'project.user', 'guest_id = '.$this->guest_id);
		}else {
			//if the user is being registered for the first time.
			$data = array(
					"username" => "'$this->username'",
					"password" => "'$this->hashedPassword'",
					"email" => "'$this->email'",
							);
				
			$this->guest_id = $db->insert($data, 'project.user');
		}
		return true;
	}

}

?>