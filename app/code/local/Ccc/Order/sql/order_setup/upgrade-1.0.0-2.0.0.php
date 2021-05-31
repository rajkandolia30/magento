<?php 
$installer = $this;
$this->startSetup();
$table = $installer->getConnection()
			->newTable($installer->getTable('order/cart'))
			->addColumn('cart_id',Varien_Db_Ddl_Table::TYPE_INTEGER,11,[
				'nullable' => false,
				'primary' => true,
				'identity' => true/*start from zero*/
			],'uniqueId')
			->addColumn('customer_id',Varien_Db_Ddl_Table::TYPE_VARCHAR,20,[
				'nullable' => false,
			],'customerId')
			->addColumn('total',Varien_Db_Ddl_Table::TYPE_DECIMAL,10,[
		        'nullable' => false
		    ],'Total')
		    ->addColumn('shipping_amount',Varien_Db_Ddl_Table::TYPE_DECIMAL,20,[
		        'nullable' => false
		    ],'ShippingAmount')
		    ->addColumn('shipping_method_code',Varien_Db_Ddl_Table::TYPE_VARCHAR,20,[
		        'nullable' => false
		    ],'ShippingMethodCode')
		    ->addColumn('payment_method_code',Varien_Db_Ddl_Table::TYPE_VARCHAR,10,[
		        'nullable' => false
		    ],'PaymentMethodCode')
		    ->addColumn('created_at',Varien_Db_Ddl_Table::TYPE_DATETIME,10,[
		        'nullable' => false
		    ],'CreatedAt')
		    ->addColumn('updated_at',Varien_Db_Ddl_Table::TYPE_DATETIME,10,[
		        'nullable' => false
		    ],'UpdatedAt');
$installer->getConnection()->createTable($table);
$this->endSetup();
 ?>