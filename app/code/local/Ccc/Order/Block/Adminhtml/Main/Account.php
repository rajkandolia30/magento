<?php 
class Ccc_Order_Block_Adminhtml_Main_Account extends Mage_Adminhtml_Block_Widget_Form_Container{

	public function __construct(){
		$this->_blockGroup = 'order';
		$this->_controller = 'adminhtml_main_account';
		parent::__construct();
	}

	public function getHeaderText(){
		return "Account Information";
	}

	public function getCustomerInformation(){
		$customerId = $this->getRequest()->getParam('id');
		return Mage::getModel('customer/customer')->load($customerId);
	}
}