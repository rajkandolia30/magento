<?php 
class Ccc_User_Block_Adminhtml_User extends Mage_Adminhtml_Block_Widget_Grid_Container{
	public function __construct(){
		$this->_controller = 'adminhtml_user';
		$this->_blockGroup = 'user';
		$this->_headerText = 'All User';
		$this->_addButtonLabel = 'Add User';
		parent::__construct();
	}
}
?>