<?php 
class Ccc_Order_Model_Cart extends Mage_Core_Model_Abstract{
	protected $customer = null;
	protected $billingAddress = null;
	protected $items = null;
	protected $shippingAddress = null;

	public function _construct(){
		$this->_init('order/cart');
	}	

	public function addItemToCart($product , $quantity = 1, $addMode = false ){
		$cartItem = Mage::getModel('order/cart_item');
		$cartItemCollection = $cartItem->getCollection();
		$query = $cartItemCollection->getselect()
			->reset(Zend_Db_Select::FROM)
			->reset(Zend_Db_Select::COLUMNS)
			->from('ccc_cart_item')
			->where('cart_id = ?', $this->cart_id)
			->where('product_id = ?', $product->getId());	
		$cartItem = $cartItemCollection->fetchItem($query);
		if($cartItem){	
			$cartItem->quantity += $quantity;
			$cartItem->save();
			return true;
		}
		$cartItem = Mage::getModel('order/cart_item');
		$cartItem->cart_id = $this->cart_id;
		$cartItem->product_id = $product->getId();
		$cartItem->quantity = $quantity;
		$cartItem->name = $product->name;
		$cartItem->sku = $product->sku;
		$cartItem->price = $product->getPrice();
		$cartItem->base_price = ($quantity * $product->getPrice());
		$cartItem->save();	
		return true;
	}

	public function setCustomer(Mage_Core_Model_Customer $customer){
		$this->customer = $customer;
		return $this;
	}

	public function getCustomer(){
		if($this->customer){
			return $this->customer;
		}
		if(!$this->cartId){
			return false;
		}
		$customer =  Mage::getModel('customer/customer')->load($this->getCustomerId());
		return $customer;		
	}
	
	public function setBillingAddress(Ccc_Order_Model_Cart_Address $billingAddress){
		$this->billingAddress = $billingAddress;
		return $this;
	}

	public function getBillingAddress(){
		if($this->billingAddress){
			return $this->billingAddress;
		}
		if(!$this->cartId){
			return false;
		}
		$address =  Mage::getModel('order/cart_address');
		$addressCollection = $address->getCollection()
			->addFieldToFilter('cart_id', ['eq' => $this->cartId])
			->addFieldToFilter('address_type', ['eq' => Ccc_Order_Model_Cart_Address::ADDRESS_TYPE_BILLING]);
		$address = $addressCollection->getFirstItem();
		return $address;		
	}

	public function setShippingAddress(Ccc_Order_Model_Cart_Address $shippingAddress){
		$this->shippingAddress = $shippingAddress;
		return $this;
	}

	public function getShippingAddress(){
		if($this->shippingAddress){
			return $this->shippingAddress;
		}
		if(!$this->cartId){
			return false;
		}
		$address =  Mage::getModel('order/cart_address');
		$addressCollection = $address->getCollection()
			->addFieldToFilter('cart_id', ['eq' => $this->cartId])
			->addFieldToFilter('address_type', ['eq' => Ccc_Order_Model_Cart_Address::ADDRESS_TYPE_SHIPPING]);
		$address = $addressCollection->getFirstItem();
		return $address;		
	}

	public function setItems(Ccc_Order_Model_Resource_Cart_Item_Collection $items){
		$this->items=$items;
		return $this;
	}

	public function getItems(){
		if($this->items){
			return $this->items;
		}

		if(!$this->cartId){
			return false;
		}

		$item = Mage::getModel('order/cart_item');
		$itemCollections = $item->getCollection()
			->addFieldToFilter('cart_id', ['eq' => $this->getCartId()]);
      	//print_r($itemCollections);
        if($itemCollections){
        	$this->setItems($itemCollections);
        }

		return $this->items;
 	}
}