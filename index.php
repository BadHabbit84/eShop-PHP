<?php 
require_once 'autoload.php';


$base_class = new BaseClass;

$all_items = $base_class->showAllItems();




include_once 'templates/frontpage.php';


//mail('balogattila84@gmail.com', 'subject', 'message', 'shop');