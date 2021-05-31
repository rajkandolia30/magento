<?php 
class Ccc_Raj_Block_Adminhtml_Raj_Edit_Tabs_Form2 extends Mage_Adminhtml_Block_Widget_Form{
	
	public function _prepareForm(){
		$form = new Varien_Data_Form();
		// $form->setUseContainer(true);/*container form set*/
		$this->setForm($form);
		$fieldSet = $form->addFieldSet('key',['legend'=>'Manage data']);/*form table heading*/
		$fieldSet->addField('email','text',[
			'label' => 'Eamil',
			'name' => 'raj[email]'
		]);
		$fieldSet->addField('mobile','text',[
			'label' => 'Mobile',
			'name' => 'raj[mobile]'
		]);
		if(Mage::registry('raj_data')){
			$form->setValues(Mage::registry('raj_data')->getData());
		}
		return parent::_prepareForm();
	}
}?>