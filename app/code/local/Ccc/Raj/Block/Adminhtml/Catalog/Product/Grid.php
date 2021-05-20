<?php
class Ccc_Raj_Block_Adminhtml_Catalog_Product_Grid extends Mage_Adminhtml_Block_Catalog_Product_Grid{
    
    protected function _prepareColumns()
    {
        $parent = parent::_prepareColumns();
        $this->addColumn('cost',
            array(
                'header'=> 'cost',
                'width' => '50px',
                'type'  => 'number',
                //'index' => 'entity_id',
        ));
        $this->removeColumn('cost');
        return $this;
    }
}
