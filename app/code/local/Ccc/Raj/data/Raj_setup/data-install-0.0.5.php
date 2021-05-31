<?php 
$data = [
	'name' => 'default',
	'email' => 'default@gmail.com',
	'mobile' => 23456789
];
$modelData = Mage::getModel('raj/raj')->setData($data)->save();	
?>