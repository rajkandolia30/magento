<?php 
class Ccc_Seller_Block_Adminhtml_Seller_Grid extends Mage_Adminhtml_Block_Widget_Grid{
	
    public function __construct()
    {
        parent::__construct();
        $this->setId('sellerGrid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        // $this->setUseAjax(true);
        $this->setVarNameFilter('seller_filter');
    }

    protected function _getStore()
    {
        $storeId = (int) $this->getRequest()->getParam('store', 0);
        return Mage::app()->getStore($storeId);
    }

    protected function _prepareCollection()
    {
        $store = $this->_getStore();

        $collection = Mage::getModel('seller/seller')->getCollection()
            ->addAttributeToSelect('firstname')
            ->addAttributeToSelect('lastname')
            ->addAttributeToSelect('email')
            ->addAttributeToSelect('phoneNo');
        $adminStore = Mage_Core_Model_App::ADMIN_STORE_ID;
        $collection->joinAttribute(
            'firstname',
            'seller/firstname',
            'entity_id',
            null,
            'left',
            $adminStore
        );

        $collection->joinAttribute(
            'lastname',
            'seller/lastname',
            'entity_id',
            null,
            'left',
            $adminStore
        );
        $collection->joinAttribute(
            'email',
            'seller/email',
            'entity_id',
            null,
            'left',
            $adminStore
        );
        $collection->joinAttribute(
            'phoneNo',
            'seller/phoneNo',
            'entity_id',
            null,   
            'left',
            $adminStore
        );
        $collection->joinAttribute(
            'id',
            'seller/entity_id',
            'entity_id',
            null,
            'left',        
            $adminStore
        );
        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }

    protected function _prepareColumns()
    {
        $this->addColumn('id',
            array(
                'header' => 'id',
                'width'  => '50px',
                'index'  => 'id',
            ));
        $this->addColumn('firstname',
            array(
                'header' => 'First Name',
                'width'  => '50px',
                'index'  => 'firstname',
            ));

        $this->addColumn('lastname',
            array(
                'header' => 'Last Name',
                'width'  => '50px',
                'index'  => 'lastname',
            ));

        $this->addColumn('email',
            array(
                'header' => 'Email',
                'width'  => '50px',
                'index'  => 'email',
            ));

        $this->addColumn('phoneNo',
            array(
                'header' => 'Phone Number',
                'width'  => '50px',
                'index'  => 'phoneNo',
            ));

        $this->addColumn('action',
            array(
                'header'   => 'Action',
                'width'    => '50px',
                'type'     => 'action',
                'getter'   => 'getId',
                'actions'  => array(
                    array(
                        'caption' => 'Delete',
                        'url'     => array(
                            'base' => '*/*/delete',
                        ),
                        'field'   => 'id',
                    ),
                ),
                'filter'   => false,
                'sortable' => false,
            ));

        parent::_prepareColumns();
        return $this;
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/index', array('_current' => true));
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array(
            'store' => $this->getRequest()->getParam('store'),
            'id'    => $row->getId())
        );
    }	
}
?>