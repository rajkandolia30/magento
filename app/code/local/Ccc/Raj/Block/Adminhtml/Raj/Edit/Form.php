<?php 
class Ccc_Raj_Block_Adminhtml_Raj_Edit_Form extends Mage_Adminhtml_Block_Widget_Form{
	
	public function _prepareForm(){
		$form = new Varien_Data_Form(
			[
				'id' => 'edit_form',
				'action' => $this->getUrl('*/*/save',['id'=>$this->getRequest()->getParam('id')]),
				'method' => 'post'
			]);
		$form->setUseContainer(true);/**/
		$this->setForm($form);
		//$fieldSet = $form->addFieldSet('key',['legend'=>'Manage data']);/*form table heading*/
		/*$fieldSet->addField('name','text',[
			'label' => 'Full Name',
			'name' => 'raj[name]',
			'class' => 'required-entry',
			'required' => true
		]);
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
		}*/
		return parent::_prepareForm();
	}
}?>