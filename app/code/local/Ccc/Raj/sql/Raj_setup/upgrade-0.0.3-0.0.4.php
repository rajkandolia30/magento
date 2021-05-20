<?php 
$installer = $this;
$installer->startSetup();
$table = $installer->getConnection()
			->newTable($installer->getTable('raj/raj1'))
			->addColumn('id',Varien_Db_Ddl_Table::TYPE_INTEGER,11,[
				'nullable' => false,
				'primary' => true,
				'identity' => true/*start from zero*/
			],'uniqueId')
			->addColumn('name',Varien_Db_Ddl_Table::TYPE_VARCHAR,20,[
				'nullable' => false,
			],'name')
			->addColumn('email',Varien_Db_Ddl_Table::TYPE_VARCHAR,20,[
				'nullable' => false,
			],'email');
$installer->getConnection()->createTable($table);
$installer->endSetup();
 ?>