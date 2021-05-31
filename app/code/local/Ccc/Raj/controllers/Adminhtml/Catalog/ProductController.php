<?php 
require_once (Mage::getModuleDir('controllers','Mage_Adminhtml').DS.'Catalog'.DS.'ProductController.php');
class Ccc_Raj_Adminhtml_Catalog_ProductController extends Mage_Adminhtml_Catalog_ProductController{

	public function newAction(){
		parent::newAction();		
	}
}
?>