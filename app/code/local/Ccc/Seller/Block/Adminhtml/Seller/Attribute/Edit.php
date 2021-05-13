<?php 
class Ccc_Seller_Block_Adminhtml_Seller_Attribute_Edit extends Mage_Adminhtml_Block_Widget_Form_Container{
	public function __construct(){
        $this->_controller = 'adminhtml_seller_attribute';
		$this->_headerText = 'Manage';
		$this->_blockGroup = 'seller';
		$this->_objectId = 'attribute_id';
		parent::__construct();

		if($this->getRequest()->getParam('popup')) {
            $this->_removeButton('back');
            $this->_addButton(
                'close',
                array(
                    'label'     => 'Close Window',
                    'class'     => 'cancel',
                    'onclick'   => 'window.close()',
                    'level'     => -1
                )
            );
        }
       
        if (!Mage::registry('entity_attribute')->getIsUserDefined()) {
            $this->_removeButton('delete');
        } else {
            $this->_updateButton('delete', 'label', 'Delete Attribute');
        }
	}

	public function getHeaderText()
    {
        if (Mage::registry('entity_attribute')->getId()) {
            $frontendLabel = Mage::registry('entity_attribute')->getFrontendLabel();
            if (is_array($frontendLabel)) {
                $frontendLabel = $frontendLabel[0];
            }
            return Mage::helper('seller')->__('Edit seller Attribute "%s"', $this->escapeHtml($frontendLabel));
        }
        else {
            return Mage::helper('seller')->__('New seller Attribute');
        }
    }

    public function getValidationUrl()
    {
        return $this->getUrl('*/*/validate', array('_current'=>true));
    }

    public function getSaveUrl()
    {
        return $this->getUrl('*/'.$this->_controller.'/save', array('_current'=>true, 'back'=>null));
    }
}

?>