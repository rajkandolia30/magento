<?php 
class Ccc_Order_Block_Adminhtml_Main_ShippingAddress extends Mage_Adminhtml_Block_Widget_Form_Container{
	protected $cart = null;

	public function __construct(){
		$this->_blockGroup = 'order';
		$this->_controller = 'adminhtml_main_shippingAddress';
		parent::__construct();
	}

	public function getHeaderText(){
		return "Shipping Address";
	}

    public function getCountryName(){
		$countryCollection = Mage::getModel('directory/country_api')->items();
        return $countryCollection;
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

	public function getShippingAddress(){
		$address = $this->getCart()->getShippingAddress();
		if($address->getId()){
			return $address;
		}
		$customerAddress = $this->getCart()->getCustomer()->getShippingAddress();
		if($customerAddress == null){
			return $address;
		}
		return $customerAddress;
	}
}