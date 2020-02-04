<?php

class BaseClass {
	
	private $items;
	private $all_items;

	public function __construct() {		
		
	}	

	public function showAllItems() {

		$this->items = new Item();
		$this->all_items = $this->items->getItems();

		return $this->all_items;
	}

}
