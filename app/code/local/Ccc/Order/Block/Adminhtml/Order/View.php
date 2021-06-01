<?php 
class Ccc_Order_Block_Adminhtml_Order_View extends Mage_Core_Block_Template{
	protected $order = null;

	public function __construct(){
	}

	public function setOrder($order){
		$this->order = $order;
		return $this;
	}

	public function getOrder(){       
        $orderId = $this->getRequest()->getParam('id');
        if(!$orderId){
            throw new Exception("Order Id Not Found");
            
        }
      	$order = Mage::getModel('order/order')->load($orderId);
      	if(!$order->getData()){
            throw new Exception("order not created");
            
        }
        $this->setOrder($order);
        return $order;
    }
}