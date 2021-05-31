<?php 
class Ccc_Order_Block_Adminhtml_Order_Grid extends Mage_Adminhtml_Block_Widget_Grid{

	public function __construct(){
		parent::__construct();
		$this->setSaveParametersInSession(true);
	}

	protected function _prepareCollection(){
        $collection = Mage::getModel('order/order')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();        
    }

    protected function _prepareColumns(){
        $this->addColumn('order_id', array(
            'header'=> Mage::helper('order')->__('Order #'),
            'index' => 'order_id',
        ));        
        $this->addColumn('customer_id', array(
            'header' => Mage::helper('order')->__('Customer id'),
            'index' => 'customer_id',
        ));
        $this->addColumn('shipping_amount', array(
            'header' => Mage::helper('order')->__('Shipping Amount'),
            'index' => 'shipping_amount',
        ));  
        $this->addColumn('shipping_method_code', array(
            'header' => Mage::helper('order')->__('Shipping Method'),
            'index' => 'shipping_method_code',
        ));        
        $this->addColumn('total', array(
            'header' => Mage::helper('order')->__('Total'),
            'index' => 'total',
        ));
        $this->addColumn('created at', array(
            'header' => Mage::helper('order')->__('Created At'),
            'index' => 'created_at',
        ));  
        $this->addColumn('action',[
            'header' => 'Action',
            'width' => '20px',
            'type' => 'action',
            'getter' => 'getId',
            'actions' => [
                [
                    'caption' => 'View',
                    'url' => ['base' => '*/*/view'],
                    'field' => 'id',
                ]
            ]
        ]);       
        return parent::_prepareColumns();
    } 
}