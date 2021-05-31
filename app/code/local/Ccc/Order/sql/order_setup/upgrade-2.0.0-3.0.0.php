<?php 
$installer = $this;
$this->startSetup();
$table = $installer->getConnection()
    ->newTable($installer->getTable('order/cart_address'))
    ->addColumn('address_id',Varien_Db_Ddl_Table::TYPE_SMALLINT,11,[
        'nullable' => false,
        'primary' => true,
        'identity' =>true
    ],'CartAddressId')
    ->addColumn('cart_id',Varien_Db_Ddl_Table::TYPE_SMALLINT,11,[
        'nullable' => false,        
    ],'Cart Id')
    ->addColumn('save_in_address_book',Varien_Db_Ddl_Table::TYPE_SMALLINT,5,[
        'nullable' => false
    ],'SaveInAddressBook')
    ->addColumn('same_as_billing',Varien_Db_Ddl_Table::TYPE_SMALLINT,5,[
        'nullable' => false
    ],'SameAsBilling')
    ->addColumn('address_type',Varien_Db_Ddl_Table::TYPE_VARCHAR,10,[
        'nullable' => false
    ],'AddressType')
    ->addColumn('street',Varien_Db_Ddl_Table::TYPE_VARCHAR,30,[
        'nullable' => false
    ],'Street')
    ->addColumn('city',Varien_Db_Ddl_Table::TYPE_VARCHAR,10,[
        'nullable' => false
    ],'City')
    ->addColumn('region',Varien_Db_Ddl_Table::TYPE_VARCHAR,15,[
        'nullable' => false
    ],'State')
    ->addColumn('country_id',Varien_Db_Ddl_Table::TYPE_VARCHAR,15,[
        'nullable' => false
    ],'Country')
    ->addColumn('postcode',Varien_Db_Ddl_Table::TYPE_INTEGER,10,[
        'nullable' => false
    ],'Zipcode');
$installer->getConnection()->createTable($table);
$this->endSetup();
 ?>