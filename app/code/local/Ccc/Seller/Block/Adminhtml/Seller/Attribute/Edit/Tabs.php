<?php 
class Ccc_Seller_Block_Adminhtml_Seller_Attribute_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs{

	public function __construct(){
		parent::__construct();
		$this->setTitle('Attribute Information');
		$this->setDestElementId('edit_form');	
	}

	public function _beforeToHtml(){
		$this->addTab('main', [
			'label' => 'Properties',
			'title' => 'Properties',
			'content' => $this->getLayout()->createBlock('seller/adminhtml_seller_attribute_edit_tabs_main')->toHtml(),
			'active' => true
		]);

		$model = Mage::registry('entity_attribute');
		
		$this->addTab('label', [
			'label' => 'Label/Control',
			'title' => 'Label/Control',
			'content' => $this->getLayout()->createBlock('seller/adminhtml_seller_attribute_edit_tabs_options')->toHtml()
		]);

		if ('select' == $model->getFrontendInput()) {
            $this->addTab('options_section', array(
                'label'     => 'Options Control',
                'title'     => 'Options Control',
                'content'   => $this->getLayout()->createBlock('seller/adminhtml_seller_attribute_edit_tab_options')->toHtml(),
            ));
        }

		return parent::_beforeToHtml();
	}
}
?>