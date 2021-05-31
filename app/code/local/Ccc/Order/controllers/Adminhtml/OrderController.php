<?php 
class Ccc_Order_Adminhtml_OrderController extends Mage_Adminhtml_Controller_Action{

	public function _initAction(){
		$this->loadLayout();
		$this->_setActiveMenu('order');
	}

	public function indexAction(){
		$this->_initAction();
		$this->renderLayout();
	}

	public function viewAction(){
		$this->_initAction();
		$this->renderLayout();
	}

	public function saveOrderAction(){
		try {
			$customerId = $this->getRequest()->getParam('id');
			$cart = Mage::getModel('order/cart')->load($customerId, 'customer_id');
			
			$cartId = $cart->getCartId();

			$order = Mage::getModel('order/order');
			$order->customer_id = $customerId;
			$order->total = $cart->getTotal();
			$order->shipping_amount = $cart->getShippingAmount();
			$order->shipping_method_code = $cart->getShippingMethodCode();
			$order->payment_method_code = $cart->getPaymentMethodCode();
			$order->created_at = date("Y-m-d H:i:s");
			$order->save();

			$cartItem = Mage::getModel('order/cart_item');
			$cartItemCollection = $cartItem->getCollection();
			$cartItemCollection->getSelect()
				->reset(Zend_Db_Select::FROM)
				->reset(Zend_Db_Select::COLUMNS)
				->from('ccc_cart_item')
				->where('cart_id = ?' , $cartId);
			$cartItems = $cartItemCollection->getData();

			foreach ($cartItems as $key => $value) {
				$orderItem = Mage::getModel('order/order_item');
				$orderItem->order_id = $order->getId();
				$orderItem->product_id = $value['product_id'];
				$orderItem->quantity = $value['quantity'];
				$orderItem->base_price = $value['base_price'];
				$orderItem->price = $value['price'];
				$orderItem->name = $value['name'];
				$orderItem->sku = $value['sku'];
				$orderItem->created_at = date("Y-m-d H:i:s");
				$orderItem->save();
			}

			$cartAddress = Mage::getModel('order/cart_address');
			$cartAddressCollection = $cartAddress->getCollection();
			$query = $cartAddressCollection->getselect()
				->reset(Zend_Db_Select::FROM)
				->reset(Zend_Db_Select::COLUMNS)
				->from('ccc_cart_address')
				->where('cart_id = ?' , $cartId)
				->where('address_type =?','billing');
			$cartAddress = $cartAddressCollection->fetchItem($query);
			if($cartAddress){
				$orderAddress = Mage::getModel('order/order_address');
				$orderAddress->order_id = $order->getId();
				$orderAddress->customer_id = $customerId;
				$orderAddress->address_type = 'billing';
				$orderAddress->street = $cartAddress->getStreet();
				$orderAddress->city = $cartAddress->getCity();
				$orderAddress->region = $cartAddress->getRegion();
				$orderAddress->country_id = $cartAddress->getCountryId();
				$orderAddress->postcode = $cartAddress->getPostcode();
				$orderAddress->firstname = $cartAddress->getFirstname();
				$orderAddress->lastname = $cartAddress->getLastname();
				$orderAddress->save();				
			} else {
				Mage::getSingleton('adminhtml/session')->addError("Cart does not have Billing address");
			}

			$cartAddressShipping = Mage::getModel('order/cart_address');
			$cartAddressCollection = $cartAddressShipping->getCollection();
			$query = $cartAddressCollection->getselect()
				->reset(Zend_Db_Select::FROM)
				->reset(Zend_Db_Select::COLUMNS)
				->from('ccc_cart_address')
				->where('cart_id = ?' , $cartId)
				->where('address_type = ?','shipping');
			$cartAddressShipping = $cartAddressCollection->fetchItem($query);
			if($cartAddressShipping){
				$orderAddressShipping = Mage::getModel('order/order_address');
				$orderAddressShipping->order_id = $order->getId();
				$orderAddressShipping->customer_id = $customerId;
				$orderAddressShipping->address_type = 'shipping';
				$orderAddressShipping->street = $cartAddressShipping->getStreet();
				$orderAddressShipping->city = $cartAddressShipping->getCity();
				$orderAddressShipping->region = $cartAddressShipping->getRegion();
				$orderAddressShipping->country_id = $cartAddressShipping->getCountryId();
				$orderAddressShipping->postcode = $cartAddressShipping->getPostcode();
				$orderAddressShipping->firstname = $cartAddressShipping->getFirstname();
				$orderAddressShipping->lastname = $cartAddressShipping->getLastname();
				$orderAddressShipping->save();	
			} else {
				Mage::getSingleton('adminhtml/session')->addError("Cart does not have Shipping address");
			}

			/*delete cart*/
			$cart = Mage::getModel('order/cart')->load($cartId)->delete();
			/*delete cart items*/
			$cartItem = Mage::getModel('order/cart_item');
			$cartItemCollection = $cartItem->getCollection();
			$cartItemCollection->getselect()
				->reset(Zend_Db_Select::FROM)
				->reset(Zend_Db_Select::COLUMNS)
				->from('ccc_cart_item')
				->where('cart_id = ?' , $cartId);
			$cartItems = $cartItemCollection->getData();

			foreach ($cartItems as $key => $value) {
				Mage::getModel('order/cart_item')->load($value['item_id'], 'item_id')->delete();
			}
			/*delete cart address*/
			$cartAddress = Mage::getModel('order/cart_address');
            $addressCollection = $cartAddress->getCollection()
                ->addFieldToFilter('cart_id', ['eq' => $cartId]);                    
                foreach ($addressCollection as $key => $value){
                    Mage::getModel('order/cart_address')->load($value['address_id'])->delete();       
            }
			Mage::getSingleton('adminhtml/session')->addSuccess("Succesfully order placed");
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
		}
		$this->_redirect('*/*/index');
	}
}
