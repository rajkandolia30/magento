<?php 
class Ccc_Order_Block_Adminhtml_Order extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct(){
		$this->_controller = 'adminhtml_order';
		$this->_headerText = 'Orders';
		$this->_blockGroup = 'order';
		$this->_addButtonLabel = 'Create new order';
		parent::__construct();
	}

	public function getCreateUrl(){
        return $this->getUrl('*/adminhtml_order_create/index');
    }
}