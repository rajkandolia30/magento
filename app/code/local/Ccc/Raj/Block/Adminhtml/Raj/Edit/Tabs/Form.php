<?php 
class Ccc_Raj_Block_Adminhtml_Raj_Edit_Tabs_Form extends Mage_Adminhtml_Block_Widget_Form{
	
	public function _prepareForm(){
		$form = new Varien_Data_Form();
		$this->setForm($form);
		$fieldSet = $form->addFieldSet('key',['legend'=>'Manage data']);
		$fieldSet->addField('name','text',[
			'label' => 'Full Name',
			'name' => 'raj[name]',
			'class' => 'required-entry',
			'required' => true
		]);
		if(Mage::registry('raj_data')){
			$form->setValues(Mage::registry('raj_data')->getData());
		}
		return parent::_prepareForm();
	}
}?>