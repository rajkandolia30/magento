<?php 
class Ccc_Raj_Block_Adminhtml_Raj extends Mage_Adminhtml_Block_Widget_Grid_Container{
	public function __construct(){
		$this->_controller = 'adminhtml_raj';
		$this->_blockGroup = 'raj';
		$this->_headerText = 'rajGrid';
		$this->_addButtonLabel = 'Add new Raj';
		parent::__construct();
	}
}
?>