<?php 
class Ccc_Order_Block_Adminhtml_Main_BillingAddress extends Mage_Adminhtml_Block_Widget_Form_Container{
	protected $cart = null;

	public function __construct(){
		$this->_blockGroup = 'order';
		$this->_controller = 'adminhtml_main_billingAddress';
		parent::__construct();
	}

	public function getHeaderText(){
		return "Billing Address";
	}

	public function getCountryName(){
		return  Mage::getModel('directory/country_api')->items();
	}

	public function setCart($cart){
		$this->cart = $cart;
		return $this;
	}

	public function getCart(){
		if(!$this->cart){
			throw new Exception("Cart not found");
		}
		return $this->cart;
	}

	public function getBillingAddress(){
		$address = $this->getCart()->getBillingAddress();
		if($address->getId()){
			return $address;
		}
		$customerAddress = $this->getCart()->getCustomer()->getBillingAddress();
		if($customerAddress == null){
			return $address;
		}
		return $customerAddress;
	}
}