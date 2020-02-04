<?php 

class Item {

	private $db;

	public function __construct() {

		$this->db = new Database;
	}

	//get all items
	public function getItems() {

		$query = "SELECT * FROM products";

		$this->db->query($query);

		$results = $this->db->resultSet();

		if (count($results) > 0) {
			return $results;
		}
		//fallback
		return false;

		
	}
}