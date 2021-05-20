<?php 
class Ccc_Raj_Block_Adminhtml_Raj_Grid extends Mage_Adminhtml_Block_Widget_Grid{
	public function __construct(){
		parent::__construct();
		// $this->setDefaultSort('id'); //for default sortinh
		// $this->setDefaultDir('desc'); 
		$this->setSaveParametersInSession(true);
	}

	public function _prepareCollection(){
		$model = Mage::getModel('raj/raj')->getCollection();
		$this->setCollection($model);
		return parent::_prepareCollection();
	}

	public function _prepareColumns(){
		$this->addColumn('id',[
			'header' => 'Id',
			'type' => 'number',
			'index' => 'id'
		]);
		$this->addColumn('name',[
			'header' => 'Name',
			'type' => 'varchar',
			'index' => 'name'
		]);
		$this->addColumn('email',[
			'header' => 'Email',
			'type' => 'text',
			'index' => 'email'
		]);
		$this->addColumn('mobile',[
			'header' => 'Mobile',
			'type' => 'number',
			'index' => 'mobile'
		]);
		$this->addColumn('action',[
			'header' => 'Action',
			'width' => '20px',
			'type' => 'action',
			'getter' => 'getId',
			'actions' => [
				[
					'caption' => 'Delete',
					'url' => ['base' => '*/*/delete'],
					'field' => 'id',
				]
			]
		]);
		return parent::_prepareColumns();
	}

	public function getRowUrl($row){
		return $this->getUrl('*/*/edit',['id' => $row->getId()]);/*frontName/ControllerName/ActionName*/
	}
}
?>