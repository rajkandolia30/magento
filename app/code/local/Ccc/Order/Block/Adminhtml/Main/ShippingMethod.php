<?php 
class Ccc_Order_Block_Adminhtml_Main_ShippingMethod extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct(){
		$this->_controller = 'adminhtml_main_shippingMethod';
		$this->_blockGroup = 'order';
		parent::__construct();
	}

	public function getHeaderText(){
		return "Shipping Method";
	}

	public function getMethods(){
		return Mage::getSingleton('shipping/config')->getActiveCarriers();
	}
}