<?php 
// require_once (Mage::getModuleDir('controllers','Ccc_Vendor').DS.'Adminhtml_VendorController.php') ;
require_once (Mage::getModuledir('controllers','Ccc_Vendor').DS.'Adminhtml'.DS.'VendorController.php');
class Ccc_Seller_Adminhtml_VendorController extends Ccc_Vendor_Adminhtml_VendorController{

	public function indexAction(){
		echo 'done';
		die();
	}
}?>