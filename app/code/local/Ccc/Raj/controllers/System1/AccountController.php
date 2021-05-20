<?php 
class Ccc_Raj_System1_AccountController extends Mage_Adminhtml_Controller_Action{

	public function indexAction(){
		$this->loadLayout();
		$this->_setActiveMenu('raj');
		$this->_title('My Account');
		//$this->_addContent($this->getLayout()->createBlock('raj/system1_account_edit'));
		//echo Zend_Debug::dump($this->getLayout()->getUpdate()->getHandles());
		// die();
		$this->renderLayout();
	}
}?>