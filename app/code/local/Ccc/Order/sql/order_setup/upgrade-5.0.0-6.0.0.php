<?php 
$installer = $this;
$installer->startSetup();
$table = $installer->getConnection()
    ->newTable($installer->getTable('order/order_address'))
    ->addColumn('address_id',Varien_Db_Ddl_Table::TYPE_SMALLINT,11,[
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
        'identity' =>true
    ],'OrderAddressId')
    ->addColumn('order_id',Varien_Db_Ddl_Table::TYPE_SMALLINT,11,[
        'nullable' => false,        
    ],'OrderId')
    ->addColumn('customer_id',Varien_Db_Ddl_Table::TYPE_SMALLINT,11,[
        'nullable' => false,        
    ],'CustomerId')
    ->addColumn('address_type',Varien_Db_Ddl_Table::TYPE_VARCHAR,10,[
        'nullable' => false
    ],'AddressType')
    ->addColumn('street',Varien_Db_Ddl_Table::TYPE_VARCHAR,20,[
        'nullable' => false
    ],'Street')
    ->addColumn('city',Varien_Db_Ddl_Table::TYPE_VARCHAR,15,[
        'nullable' => false
    ],'City')
    ->addColumn('region',Varien_Db_Ddl_Table::TYPE_VARCHAR,10,[
        'nullable' => false
    ],'State')
    ->addColumn('country_id',Varien_Db_Ddl_Table::TYPE_VARCHAR,10,[
        'nullable' => false
    ],'Country')
    ->addColumn('postcode',Varien_Db_Ddl_Table::TYPE_INTEGER,10,[
        'nullable' => false
    ],'Zipcode');    
$installer->getConnection()->createTable($table);
$installer->endsetup();
 ?>