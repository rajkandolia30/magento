<?php 
class Ccc_User_Block_Adminhtml_User_Edit_Form extends Mage_Adminhtml_Block_Widget_Form{

	public function _prepareForm(){
		$form = new Varien_Data_Form(
			[
				'id' => 'edit_form',
				'action' => $this->getUrl('*/*/save', ['id' => $this->getRequest()->getParam('id')]),
				'method' => 'post'
			]);
		$form->setUseContainer(true);
		$this->setForm($form);
		$fieldSet = $form->addFieldSet('key', ['legend' => 'information']);
		$fieldSet->addField('name','text',[
			'label' => 'Name',
			'name' => 'user[name]',
			'class' => 'required-entry',
			'required' => true
		]);
		$fieldSet->addField('age','text',[
			'label' => 'Age',
			'name' => 'user[age]',
		]);
		$fieldSet->addField('email','text',[
			'label' => 'Email',
			'name' => 'user[email]'
		]);
		if(Mage::registry('user_data')){
			$form->setValues(Mage::registry('user_data')->getData());
		}
		return parent::_prepareForm();
	}
}
?>