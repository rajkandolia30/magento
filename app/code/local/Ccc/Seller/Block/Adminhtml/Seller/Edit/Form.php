<?php 
class Ccc_Seller_Block_Adminhtml_Seller_Edit_Form extends Mage_Adminhtml_Block_Widget_Form{

	public function _prepareForm(){
		$form = new Varien_Data_Form([
			'id' => 'edit_form',
			'method' => 'post',
			'action' => $this->getUrl('*/*/save' , ['id' => $this->getRequest()->getParam('id')]),
			'enctype' => 'multipart/form-data',
		]);
		$form->setUseContainer(true);
		$this->setForm($form);
		return parent::_prepareForm();
	}
}
?>