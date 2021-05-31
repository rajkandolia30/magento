<?php 
class Ccc_Seller_Block_Adminhtml_Seller_Attribute extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct(){
		$this->_controller = 'adminhtml_seller_attribute';
		$this->_blockGroup = 'seller';
		$this->_headerText = 'Manage Attribute';
		$this->_addButtonLabel = 'Add New Attribute';
		parent::__construct();
	}
}
?>