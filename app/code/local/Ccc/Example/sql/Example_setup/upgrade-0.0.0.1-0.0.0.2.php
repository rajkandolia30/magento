<?php 
$installer = $this;
$installer->startSetup();
$table = $installer->getConnection()
			->newTable($installer->getTable('example/example'))
			->addColumn('id',Varien_Db_Ddl_Table::TYPE_INTEGER,11,[
				'nullable' => false,
				'primary' => true,
				'identity' => true/*start from zero*/
			],'exampleUniqueId')
			->addColumn('name',Varien_Db_Ddl_Table::TYPE_VARCHAR,20,[
				'nullable' => false,
			],'name')
			->addColumn('email',Varien_Db_Ddl_Table::TYPE_VARCHAR,25,[
				'nullable' => false,
			],'email')
			->addColumn('mobile',Varien_Db_Ddl_Table::TYPE_INTEGER,10,[
				'nullable' => false,
			],'mobileNumber');
$installer->getConnection()->createTable($table);
$installer->endSetup();
 ?>