<?php
class Ccc_Seller_Adminhtml_Seller_GroupController extends Mage_Adminhtml_Controller_Action
{
    protected function _isAllowed()    {
        return Mage::getSingleton('admin/session')->isAllowed('seller/seller');
    }
    
    public function saveAction()    {
        $model = Mage::getModel('eav/entity_attribute_group');
        $model->setAttributeGroupName($this->getRequest()->getParam('attribute_group_name'))
              ->setAttributeSetId($this->getRequest()->getParam('attribute_set_id'));
        if( $model->itemExists() ) {
            Mage::getSingleton('seller/session')->addError('A group with the same name already exists.');
        } else {
            try {
                $model->save();
            } catch (Exception $e) {
                Mage::getSingleton('seller/session')->addError('An error occurred while saving this group.');
            }
        }
    }

}