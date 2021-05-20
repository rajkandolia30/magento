<?php 
class Ccc_Raj_Block_Adminhtml_Raj_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs{
	
	public function __construct(){
		parent::__construct();
		$this->setDestElementId('edit_form');/**/
	}

	public function _beforeToHtml(){
		$this->addTab('form_section',[
			'label' => 'Form Section',
			'content' => $this->getLayout()->createBlock('raj/adminhtml_raj_edit_tabs_form')->toHtml(),
		]);
		$this->addTab('form_section2',[
			'label' => 'Form Section2',
			'content' => $this->getLayout()->createBlock('raj/adminhtml_raj_edit_tabs_form2')->toHtml(),
			'active' => true 
		]);
		return parent::_beforeToHtml();
	}
}?>
