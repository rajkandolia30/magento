<?php 
class Ccc_Seller_Block_Adminhtml_Seller_Attribute_Edit_Form extends Mage_Adminhtml_Block_Widget_Form{

	public function _prepareForm(){
		$form = new Varien_Data_Form([
			'id' => 'edit_form',
			'method' => 'post',
			'action' => $this->getUrl('*/*/save' , $this->getRequest()->getParam('id'))
		]);
		$form->setUseContainer(true);
		$this->setForm($form);
		return parent::_prepareForm();
	}
}
?>