<?php
//Reserveation.class.php

require_once 'Db.class.php';

class Reservation {
	
	public $reservation_no;
	public $guest_id;
	public $start_date;
	public $end_date;
	public $room_no;
	public $hotel_id;
	
	function __construct($data) {
		$this->reservation_no = (isset($data['reservation_no'])) ? data['reservation_no'] : "";
		$this->guest_id = (isset($data['guest_id'])) ? data['guest_id'] : "";
		$this->start_date = (isset($data['start_date'])) ? data['start_date'] : "";
		$this->end_date = (isset($data['end_date'])) ? data['end_date'] : "";
		$this->room_no = (isset($data['room_no'])) ? data['room_no'] : "";
		$this->hotel_id = (isset($data['hotel_id'])) ? data['hotel_id'] : "";
	}
	
	public function save() {
		
		$db = new DB();
			
		$data =array(
				"reservation_no" => "'$this->reservation_no'",
				"guest_id" => "'$this->guest_id'",
				"start_date" => "'$this->start_date'",
				"end_date" => "'$this->end_date'",
				"room_no" => "'$this->room_no'",
				"hotel_id" => "'$this->hotel_id'"
		);
		
		$this->reservation_no = $db->insert($data, 'project.reservation');
		
		return true;
	}
	
}