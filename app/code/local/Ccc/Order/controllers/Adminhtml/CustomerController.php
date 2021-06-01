<?php 
require_once (Mage::getModuleDir('controllers','Mage_Adminhtml').DS.'CustomerController.php');
class Ccc_Order_Adminhtml_CustomerController extends Mage_Adminhtml_CustomerController{

	public function saveAction(){
		parent::saveAction();
		$this->_redirect('*/adminhtml_order_create/index');
	}
}