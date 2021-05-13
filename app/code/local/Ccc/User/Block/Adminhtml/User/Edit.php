<?php 
class Ccc_User_Block_Adminhtml_User_Edit extends Mage_Adminhtml_Block_Widget_Form_Container{
	public function __construct(){
		$this->_controller = 'adminhtml_user';
		$this->_blockGroup = 'user';
		$this->_headerText = 'Manage';
		parent::__construct();
	}
}?>