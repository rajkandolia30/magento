<?php 
class Ccc_Seller_Block_Adminhtml_Seller extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct(){
		$this->_controller = 'adminhtml_seller';
		$this->_blockGroup = 'seller';
		$this->_headerText = 'Manage Seller';
		parent::__construct();
	}
}

?>