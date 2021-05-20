<?php 
class Ccc_Example_Block_Adminhtml_Example extends Mage_Adminhtml_Block_Widget_Grid_Container{
	public function __construct(){
		$this->_controller = 'adminhtml_example';
		$this->_blockGroup = 'example';/**/
		$this->_headerText = 'Grid';
		$this->_addButtonLabel = 'Add new Example';
		parent::__construct();
	}
}
?>