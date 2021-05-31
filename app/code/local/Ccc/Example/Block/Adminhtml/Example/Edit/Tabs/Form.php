<?php 
class Ccc_Example_Block_Adminhtml_Example_Edit_Tabs_Form extends Mage_Adminhtml_Block_Widget_Form{
	
	public function _prepareForm(){
		$form = new Varien_Data_Form();
		$this->setForm($form);
		$fieldSet = $form->addFieldSet('key',['legend'=>'Manage data']);
		$fieldSet->addField('name','text',[
			'label' => 'Full Name',
			'name' => 'example[name]',
			'class' => 'required-entry',
			'required' => true
		]);
		$fieldSet->addField('email','text',[
			'label' => 'Email',
			'name' => 'example[email]'
		]);
		$fieldSet->addField('mobile','text',[
			'label' => 'Mobile',
			'name' => 'example[mobile]'
		]);
		if(Mage::registry('example_data')){
			$form->setValues(Mage::registry('example_data')->getData());
		}
		return parent::_prepareForm();
	}
 }?>                                        