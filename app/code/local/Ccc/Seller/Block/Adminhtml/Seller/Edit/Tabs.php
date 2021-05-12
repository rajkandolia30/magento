<?php 
class Ccc_Seller_Block_Adminhtml_Seller_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs{

	public function __construct(){
		parent::__construct();
		$this->setDestElementId('edit_form');
	}

	public function getSeller(){
		return Mage::registry('current_seller');
	}

	public function _beforeToHtml(){

		$sellerAttributes = Mage::getResourceModel('seller/seller_attribute_collection');

		if (!$this->getSeller()->getId()) {
            foreach ($vendorAttributes as $attribute) {
                $default = $attribute->getDefaultValue();
                if ($default != '') {
                    $this->getSeller()->setData($attribute->getAttributeCode(), $default);
                }
            }
        }
        $attributeSetId = $this->getSeller()->getResource()->getEntityType()->getDefaultAttributeSetId();
        //attributesetid = 14;
        $groupCollection = Mage::getResourceModel('eav/entity_attribute_group_collection')
            ->setAttributeSetFilter($attributeSetId)
            ->setSortOrder()
            ->load();
        $defaultGroupId = 0;
        foreach ($groupCollection as $group) {
            if ($defaultGroupId == 0 or $group->getIsDefault()) {
                $defaultGroupId = $group->getId();
            }
        }	
	        	
	    //$defaultGroupId = 43

        foreach ($groupCollection as $group) {
            $attributes = array();
            foreach ($sellerAttributes as $attribute) {
                if ($this->getSeller()->checkInGroup($attribute->getId(),$attributeSetId, $group->getId())) {
                    $attributes[] = $attribute;
                }
            }

            if (!$attributes) {
                continue;
            }
  
            $active = $defaultGroupId == $group->getId();
            $block = $this->getLayout()->createBlock('seller/adminhtml_seller_edit_tabs_form')
                ->setGroup($group)
                ->setAttributes($attributes)
                ->setAddHiddenFields($active)
                ->toHtml();
            $this->addTab('group_' . $group->getId(), array(
                'label'     => $group->getAttributeGroupName(),
                'content'   => $block,
                'active'    => $active
            ));
        }
      	return parent::_beforeToHtml();
	}
}
?>