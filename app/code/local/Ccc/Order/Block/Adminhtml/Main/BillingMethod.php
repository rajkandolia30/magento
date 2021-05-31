<?php 
class Ccc_Order_Block_Adminhtml_Main_BillingMethod extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct(){
		$this->_controller = 'adminhtml_main_billingMethod';
		$this->_blockGroup = 'order';
		parent::__construct();
	}

	public function getMethods(){
		return $allActivePaymentMethods = Mage::getModel('payment/config')->getActiveMethods();
	}

	public function getHeaderText(){
		return "Billing Method";
	}
}