<?php 
class Ccc_Order_Block_Adminhtml_Main_OrderItem extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct(){
		$this->_blockGroup = 'order';
		$this->_controller = 'adminhtml_main_orderItem';
		parent::__construct();
	}

	public function getHeaderText(){
		return "Items Order";
	}

	public function cartItemData(){
		$customerId = $this->getRequest()->getParam('id');

		$cartCollection = Mage::getModel('order/cart')->getCollection();
		$query = $cartCollection->getselect()
			->reset(Zend_Db_Select::FROM)
			->reset(Zend_Db_Select::COLUMNS)
			->from('ccc_cart')
			->where('customer_id = ?', $customerId);
		$cartCollection = $cartCollection->fetchItem($query);
		if($cartCollection){
			$cartId = $cartCollection->getCartId();
		}
		$cartItemCollection = Mage::getModel('order/cart_item')->getCollection();
		$query = $cartItemCollection->getselect()
			->reset(Zend_Db_Select::FROM)
			->reset(Zend_Db_Select::COLUMNS)
			->from('ccc_cart_item')
			->where('cart_id = ?', $cartId);
		return $cartItemCollection ;
	}
} 