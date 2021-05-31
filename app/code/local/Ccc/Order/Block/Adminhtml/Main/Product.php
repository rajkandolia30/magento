<?php 
class Ccc_Order_Block_Adminhtml_Main_Product extends Mage_Adminhtml_Block_Widget_Grid_Container{
	
	public function __construct(){
		$this->_blockGroup = 'order';
		$this->_controller = 'adminhtml_main_product';
		parent::__construct();
	}

	public function getHeaderText(){
		return "Select Products";
	}
}