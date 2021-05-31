<?php 
class Ccc_Order_Block_Adminhtml_Main_OrderTotal extends Mage_Adminhtml_Block_Template{

	public function __construct(){
		parent::__construct();
	}

	public function getCart(){
		$customerId = $this->getRequest()->getParam('id');
		$cart = Mage::getModel('order/cart');
		$cartCollection = $cart->getCollection();
		$select = $cartCollection->getSelect()
		->reset(Zend_Db_Select::FROM)
		->reset(Zend_Db_Select::COLUMNS)
		->from('ccc_cart')
		->where('customer_id = ?', $customerId);
		$cartData = $cartCollection->fetchItem($select);        
		return $cartData;
    }

	public  function getBaseTotal(){
        $cart = $this->getCart();
	        if($cart){
	       		$cartId = $cart->getId();
	        }
       	$cartItem = Mage::getModel('order/cart_item');
      	$cartItemCollection = $cart->getCollection();
        $cartItemCollection->getSelect()
        ->reset(Zend_Db_Select::FROM)
        ->reset(Zend_Db_Select::COLUMNS)
        ->from('ccc_cart_item')
        ->where('cart_id = ?', $cartId);      
        $total = 0;
        if($cartItemCollection){
            foreach ($cartItemCollection->getData() as $item){
               $total  += $item['base_price'];
            }
          $cart->total = $total;
          $cart->save();
        }
        return $total;
    }   

    public  function getShippingCharges(){
        $cart = $this->getCart();
        if($cart){   
            return $cart->shipping_amount;
        }
        return 0;
    }

    public function getGrantTotal(){
        return $this->getBaseTotal() + $this->getShippingCharges();
    }

	public function getHeaderText(){
		return "Total";
	}
}