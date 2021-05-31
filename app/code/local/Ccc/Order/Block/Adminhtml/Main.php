<?php 
class Ccc_Order_Block_Adminhtml_Main extends Mage_Adminhtml_Block_Template{
    protected $cart = null;

    public function __construct(){
		parent::__construct();
	}
    
    public function getHeader(){
    	return "Create new order";
    }

    public function getHeaderText(){
    	return "Create Order";
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
}
