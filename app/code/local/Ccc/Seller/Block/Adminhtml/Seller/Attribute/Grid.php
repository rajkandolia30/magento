<?php 
class Ccc_Seller_Block_Adminhtml_Seller_Attribute_Grid extends Mage_Eav_Block_Adminhtml_Attribute_Grid_Abstract{

	public function _prepareCollection(){
		$model = Mage::getResourceModel('seller/seller_attribute_collection');
		$this->setCollection($model);
		return parent::_prepareCollection();
	}

	public function _prepareColumns(){
        parent::_prepareColumns();
        $this->addColumn('is_visible', array(
            'header'=> 'Visible',
            'sortable'=>true,
            'index'=>'is_visible_on_front',
            'type' => 'options',
            'options' => array(
                '1' => 'Yes',
                '0' => 'no',
            ),
            'align' => 'center',
        ), 'frontend_label');
        $this->addColumn('is_global', array(
            'header'=>Mage::helper('catalog')->__('Scope'),
            'sortable'=>true,
            'index'=>'is_global',
            'type' => 'options',
            'options' => array(
                Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE =>Mage::helper('catalog')->__('Store View'),
                Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_WEBSITE =>Mage::helper('catalog')->__('Website'),
                Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL =>Mage::helper('catalog')->__('Global'),
            ),
            'align' => 'center',
        ), 'is_visible');
        $this->addColumn('is_searchable', array(
            'header'=> 'Searchable',
            'sortable'=>true,
            'index'=>'is_searchable',
            'type' => 'options',
            'options' => array(
                '1' => 'Yes',
                '0' => 'No',
            ),
            'align' => 'center',
        ), 'is_user_defined');
        $this->addColumn('is_filterable', array(
            'header'=> 'Use in Layered Navigation',
            'sortable'=>true,
            'index'=>'is_filterable',
            'type' => 'options',
            'options' => array(
                '1' => 'Filterable (with results)',
                '2' => 'Filterable (no results)',
                '0' => 'No',
            ),
            'align' => 'center',
        ), 'is_searchable');
        $this->addColumn('is_comparable', array(
            'header'=> 'Comparable',
            'sortable'=>true,
            'index'=>'is_comparable',
            'type' => 'options',
            'options' => array(
                '1' => 'yes',
                '0' => 'No',
            ),
            'align' => 'center',
        ), 'is_filterable');

        return $this;
	}
}
?>