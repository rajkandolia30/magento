<?php 
class Ccc_Order_Block_Adminhtml_Customer_Grid extends Mage_Adminhtml_Block_Widget_Grid{

	public function __construct(){
		parent::__construct();
		$this->setSaveParametersInSession(true);
	}

	public function _prepareCollection(){
		$model = Mage::getModel('customer/customer')->getCollection()
			->addNameToSelect()
            ->addAttributeToSelect('email')
            ->addAttributeToSelect('firstname')
            ->addAttributeToSelect('lastname');
		$this->setCollection($model);
		return parent::_prepareCollection();
	}

	public function _prepareColumns(){
		 $this->addColumn('entity_id', [
            'header'    => 'ID',
            'width'     => '50px',
            'index'     => 'entity_id',
            'type'  => 'number',
        ]);
        $this->addColumn('name', [
            'header'    => 'Name',
            'index'     => 'name'
        ]);
        $this->addColumn('email', [
            'header'    => 'Email',
            'width'     => '150',
            'index'     => 'email'
        ]);
        $groups = Mage::getResourceModel('customer/group_collection')
            ->addFieldToFilter('customer_group_id', ['gt'=> 0])
            ->load()
            ->toOptionHash();
        $this->addColumn('group', [
            'header'    =>  'Group',
            'width'     =>  '100',
            'index'     =>  'group_id',
            'type'      =>  'options',
            'options'   =>  $groups,
        ]);
        return parent::_prepareColumns();
	}

    public function getRowUrl($row){
        return $this->getUrl('*/adminhtml_order_create/new', ['id' => $row->getId()]);
    }
}