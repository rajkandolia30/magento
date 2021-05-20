<?php 
class Ccc_Example_Block_Adminhtml_Example_Edit extends Mage_Adminhtml_Block_Widget_Form_Container{
	public function __construct(){
		$this->_controller = 'adminhtml_example';
		$this->_blockGroup = 'example';
		$this->_headerText = 'Manage';
		parent::__construct();
	}
}?>
