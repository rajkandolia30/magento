<?php 
class Ccc_Seller_Block_Adminhtml_Seller_Edit_Tabs_Form extends Mage_Adminhtml_Block_Widget_Form{

	public function getSeller(){
        return Mage::registry('current_seller');
    }


    protected function _prepareLayout(){
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
        parent::_prepareLayout();
    }
	
	public function _prepareForm(){
		$group = $this->getGroup();
        $attributes = $this->getAttributes();
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $form->setDataObject($this->getSeller());
        $form->setHtmlIdPrefix('group_' . $group->getId());
        $form->setFieldNameSuffix('seller');
        $fieldset = $form->addFieldset('fieldset_group_' . $group->getId(), array(
            'legend'    => $group->getAttributeGroupName(),
            'class'     => 'fieldset',
        ));
        $this->_setFieldset($attributes, $fieldset);
        $form->addValues($this->getSeller()->getData());
        return parent::_prepareForm();
	}
}
?>