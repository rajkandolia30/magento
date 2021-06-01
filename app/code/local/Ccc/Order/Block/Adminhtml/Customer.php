<?php 
class Ccc_Order_Block_Adminhtml_Customer extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct(){
		$this->_controller = 'adminhtml_customer';
		$this->_blockGroup = 'order';
		$this->_headerText = 'Select Customer';
		$this->_addButtonLabel = 'Create new customer';
		parent::__construct();
		$this->addButton ('back', [
            'label' =>  'Back',
            'onclick'   => 'setLocation(\'' . $this->getUrl('*/adminhtml_order/index') . '\')',
            'class'     =>  'back'
        ], 0, 1,  'header');
	}

	public function getBackUrl(){
		return $this->getUrl('*/adminhtml_order/index');
	}

	public function getCreateUrl(){
        return $this->getUrl('*/customer/new');
    }
}