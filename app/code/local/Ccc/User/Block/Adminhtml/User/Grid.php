<?php 
class Ccc_User_Block_Adminhtml_User_Grid extends Mage_Adminhtml_Block_Widget_Grid{
	public function __construct(){
		parent::__construct();
		$this->setSaveParamterInSessionId(true);
	}

	public function _prepareCollection(){
		$model = Mage::getModel('user/user')->getCollection();
		$this->setCollection($model);
		return parent::_prepareCollection();
	}

	public function _prepareColumns(){
		$this->addColumn('id',[
			'header' => 'Id',
			'type' => 'text',
			'index' => 'id'
		]);
		$this->addColumn('name',[
			'header' => 'Name',
			'type' => 'text',
			'index' => 'name',
		]);
		$this->addColumn('age',[
			'header' => 'Age',
			'type' => 'text',
			'index' => 'age'
		]);
		$this->addColumn('email',[
			'header' => 'Email',
			'type' => 'text',
			'index' => 'email'
		]);
		$this->addColumn('action',[
			'header' => 'Action',
			'type' => 'action',
			'width' => '30px',
			'getter' => 'getId',
			'actions' => [
				[
					'caption' => 'Delete',
					'url' => ['base' => '*/*/delete'],
					'field' => 'id'
				]
			]
		]);
		return parent::_prepareColumns();
	}

	public function getRowUrl($row){
		return $this->getUrl('*/*/edit',['id'=> $row->getId()]);
	}
}
?>