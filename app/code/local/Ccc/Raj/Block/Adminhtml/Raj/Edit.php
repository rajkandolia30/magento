<?php 
class Ccc_Raj_Block_Adminhtml_Raj_Edit extends Mage_Adminhtml_Block_Widget_Form_Container{
	public function __construct(){
		$this->_controller = 'adminhtml_raj';
		$this->_blockGroup = 'raj';
		$this->_headerText = 'Manage';
		parent::__construct();
	}
}?>
