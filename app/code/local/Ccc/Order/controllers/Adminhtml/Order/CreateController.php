<?php 
class Ccc_Order_Adminhtml_Order_CreateController extends Mage_Adminhtml_Controller_Action{

	public function indexAction(){
		$this->loadLayout();
		$this->renderLayout();
	}

	public function newAction(){
		$this->loadlayout();
		$this->getLayout()->getBlock('cart')->setCart($this->getCart());
		$this->renderLayout();
	}

	public function addToCartAction(){
		try {
			$customerId = $this->getRequest()->getParam('id');
			if(!$customerId){
				throw new Exception("Customer not found");
			}
			$productIds = $this->getRequest()->getParam('product');
			foreach ($productIds as $key => $value) {
				$product = Mage::getModel('catalog/product')->load($value);
				if(!$product){
					throw new Exception("Product not Found");				
				}
			}			
			$cart = $this->getCart();
			foreach ($productIds as $key => $value) {
				$product = Mage::getModel('catalog/product')->load($value);
					if(!$product){
						throw new Exception("Product not Found");				
					}	
				$cart->addItemToCart($product, 1, true);
			}
			Mage::getSingleton('adminhtml/session')->addSuccess("Items added successfully");
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
		}
		$this->_redirect('*/*/new', ['id' => $customerId]);
	}

	public function getCart(){
		try {
			$customerId = $this->getRequest()->getParam('id');
			if(!$customerId){
				throw new Exception("Customer not found");
			}
			$cart = Mage::getModel('order/cart')->load($customerId, 'customer_id');
			if($cart->getData()){
				return $cart;
			}
			$cart = Mage::getModel('order/cart');
			$cart->customer_id = $customerId;
			$cart->created_at = date("Y-m-d H:i:s");
			$cart->save();
			return $cart;			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function saveBillingAddressAction(){
		try {
			$cart = $this->getCart();
			$customerId = $cart->getCustomerId();

			$billing = $this->getRequest()->getPost('billing');

			$cartBillingAddress = $cart->getBillingAddress();
			if(!$cartBillingAddress->getAddressId()){
				$cartBillingAddress->setCartId($cart->getId());
				$cartBillingAddress->setAddressType('billing');
				$cartBillingAddress->setCreatedAt(date("Y-m-d H:i:s"));				
			} else {
				$cartBillingAddress->setUpdatedAt(date("Y-m-d H:i:s"));
			}
			$cartBillingAddress->addData($billing);
			$cartBillingAddress->save();

			$saveInAddress = $this->getRequest()->getPost('save_in_address_book');
			if($saveInAddress){
				$billingAddress = $cart->getCustomer()->getBillingAddress();
				if(!$billingAddress->getEntityId()){
					$billingAddress->setParentId($customerId);
					$billingAddress->setIsDefaultBilling(1);
					$billingAddress->setCreatedAt(date("Y-m-d H:i:s"));
				} else {
					$billingAddress->setUpdatedAt(date("Y-m-d H:i:s"));
				}
				$billingAddress->addData($billing);
				$billingAddress->save();
			}	
			Mage::getSingleton('adminhtml/session')->addSuccess('Succesfully inserted');	
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
		}
		$this->_redirect('*/*/new', ['id' => $customerId]);
	}

	public function saveShippingAddressAction(){
		try {
			$cart = $this->getCart();
			$customerId = $cart->getCustomerId();

			$shipping = $this->getRequest()->getPost('shipping');

			$saveInAddress = $this->getRequest()->getPost('save_in_address_book');
			if($saveInAddress){
				$shippingAddress = $cart->getCustomer()->getShippingAddress();
				if(!$shippingAddress->getEntityId()){
					$shippingAddress->setParentId($customerId);
					$shippingAddress->setIsDefaultShipping(1);
					$shippingAddress->setCreatedAt(date("Y-m-d H:i:s"));
				} else {
					$shippingAddress->setUpdatedAt(date("Y-m-d H:i:s"));
				}
				$shippingAddress->addData($shipping);
				$shippingAddress->save();
			}	

			if(!empty($shipping['firstname']) 
				&& !empty($shipping['lastname']) 
				&& !empty($shipping['street'])
				&& !empty($shipping['city'])
				&& !empty($shipping['country_id'])
				&& !empty($shipping['region'])
				&& !empty($shipping['postcode'])){
				$cartShippingAddress = $cart->getShippingAddress();
				if(!$cartShippingAddress->getAddressId()){
					$cartShippingAddress->setCartId($cart->getId());
					$cartShippingAddress->setAddressType('shipping');
					$cartShippingAddress->setCreatedAt(date("Y-m-d H:i:s"));				
				} else {
					$cartShippingAddress->setUpdatedAt(date("Y-m-d H:i:s"));
				}
				$cartShippingAddress->addData($shipping);
				$cartShippingAddress->save();


				$sameAsBilling = $this->getRequest()->getPost('same_as_billing');
				if($sameAsBilling){
					$billing = $cart->getBillingAddress()->getData();
					unset($billing['address_id']);
					if(!$billing){
						throw new Exception("Insert cart billing Address");
					}
					$shipping = $cart->getShippingAddress();
					$shipping->addData($billing);
					$shipping->setAddressType('shipping');
					$shipping->save();
				}				
			} else {
				throw new Exception("Please enter all fields in shipping address");			
			}
			Mage::getSingleton('adminhtml/session')->addSuccess('Succesfully inserted');
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
		}
		$this->_redirect('*/*/new', ['id' => $customerId]);	
	}

	public function saveBillingMethodAction(){
		try {
			$cart = $this->getCart();
			$customerId = $cart->getCustomerId();
			$method = $this->getRequest()->getPost('billingMethod');
			$cart->setPaymentMethodCode($method);
			$cart->setUpdatedAt(date("Y-m-d H:i:s"));
			$save = $cart->save();
			if(!$save){
				Mage::getSingleton('adminhtml/session')->addError("Enable to save");
			}	
			Mage::getSingleton('adminhtml/session')->addSuccess('Succesfully inserted');
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
		}	
		$this->_redirect('*/*/new', ['id' => $customerId]);	
	}

	public function saveShippingMethodAction(){
		try {
			$cart = $this->getCart();
			$customerId = $cart->getCustomerId();
			$method = $this->getRequest()->getPost('shippingMethod');

			$info = explode(' ', $method);
			$title = $info[0];
			$price = $info[1];

			$cart->setShippingMethodCode($title);
			$cart->setShippingAmount($price);
			$cart->setUpdatedAt(date("Y-m-d H:i:s"));
			$save = $cart->save();
			if(!$save){
				Mage::getSingleton('adminhtml/session')->addError("Enable to save");
			}	
			Mage::getSingleton('adminhtml/session')->addSuccess("Record inserted succesfully");
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
		}
		$this->_redirect('*/*/new', ['id' => $customerId]);			
	}

	public function updateCartItemAction(){
		try {
			$customerId = $this->getRequest()->getParam('id');
			$quantites = $this->getRequest()->getParam('quantity');
			if(!$customerId){
				throw new Exception("Customer not found");
			}
			foreach ($quantites as $key => $quantity) {
				if($quantity < 0){
					Mage::getSingleton('adminhtml/session')->addError('Please insert Valid quantity');
				} 
				if ($quantity == 0){
					$model = Mage::getModel('order/cart_item')->load($key);
					$model->delete();
					continue;
				}
				if($quantity > 0){
					$cartItem = Mage::getModel('order/cart_item')->load($key);	
					$basePrice =  $quantity * $cartItem->price - ($cartItem->discount * $quantity);
			        $cartItem->base_price = $basePrice; 
			        $cartItem->quantity = $quantity;
			        $cartItem->save();
				}
			}
			Mage::getSingleton('adminhtml/session')->addSuccess('Succesfully updtaed');
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
		}
		$this->_redirect('*/*/new', ['id' => $customerId]);
	}

	public function deleteCartItemAction(){
		try {
			$customerId = $this->getRequest()->getParam('id');
			$cart = $this->getCart();
			$cartId = $cart->getId();
			if(!$customerId){
				throw new Exception("Customer not found");
			}
			if(!$cartId){
				Mage::getSingleton('adminhtml/session')->addError("Invali id");	
			}
			$model = Mage::getModel('order/cart_item')->load($cartId , 'cart_id');
			if(!$model){
				Mage::getSingleton('adminhtml/session')->addError("Items Not Found");
			}		
			if(!$model->delete()){
				Mage::getSingleton('adminhtml/session')->addError("Enable to delete");
			}	
			Mage::getSingleton('adminhtml/session')->addSuccess("Record deleted succesfully");				
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
		}
		$this->_redirect('*/*/new', ['id' => $customerId]);
	}
}