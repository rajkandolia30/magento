<?php 
class Ccc_Example_Block_Adminhtml_Example_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs{
	public function __construct(){
		parent::__construct();
		$this->setDestElementId('edit_form');
	}

	public function _beforeToHtml(){
		$this->addTab('section1',[
			'label' => 'Section 1',
			'content' => $this->getLayout()->createBlock('example/adminhtml_example_edit_tabs_form')->toHtml(),
			'active' => true
		]);
		return parent::_beforeToHtml();
	}
}
?>