<?php 
class Ccc_Raj_Block_Test extends Mage_Core_Block_Template{
	public function __construct(){
		// echo "Test Construct";
	}

	public function _prepareCollection(){
		return Mage::getModel('raj/raj')->getCollection();
	}
}?>
