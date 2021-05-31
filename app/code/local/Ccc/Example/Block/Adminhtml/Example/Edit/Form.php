<?php 
class Ccc_Example_Block_Adminhtml_Example_Edit_Form extends Mage_Adminhtml_Block_Widget_Form{
	
	public function _prepareForm(){
		$form = new Varien_Data_Form(
			[
				'id' => 'edit_form',
				'action' => $this->getUrl('*/*/save',['id' => $this->getRequest()->getParam('id')]),
				'method' => 'post'
			]);
		$form->setUseContainer(true);
		$this->setform($form);
		/*$fieldSet = $form->addFieldSet('key',['legend'=>'Manage Examples']);
		$fieldSet->addField('name', 'text',[
			'label' => 'Name',
			'name' => 'example[name]'
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
		}*/
		return parent::_prepareForm();
	}
}?>