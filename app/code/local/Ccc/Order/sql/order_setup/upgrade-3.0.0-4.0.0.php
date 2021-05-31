<?php 
$installer = $this;
$installer->startSetup();
$table = $installer->getConnection()
    ->newTable($installer->getTable('order/cart_item'))
    ->addColumn('item_id',Varien_Db_Ddl_Table::TYPE_SMALLINT,11,[
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
        'identity' =>true
    ],'CartItemId')
    ->addColumn('cart_id',Varien_Db_Ddl_Table::TYPE_SMALLINT,11,[
        'nullable' => false,
    ],'CartId')
    ->addColumn('product_id',Varien_Db_Ddl_Table::TYPE_SMALLINT,11,[
        'nullable' => false,        
    ],'ProductId')
    ->addColumn('quantity',Varien_Db_Ddl_Table::TYPE_SMALLINT,10,[
        'nullable' => false
    ],'Quantity')
    ->addColumn('base_price',Varien_Db_Ddl_Table::TYPE_DECIMAL,20,[
        'nullable' => false
    ],'BasePrice')
    ->addColumn('price',Varien_Db_Ddl_Table::TYPE_DECIMAL,10,[
        'nullable' => false
    ],'AddressType')
    ->addColumn('discount',Varien_Db_Ddl_Table::TYPE_DECIMAL,10,[
        'nullable' => false
    ],'Discount');  
$installer->getConnection()->createTable($table);
$installer->endSetup();
?>