<?php 
$installer = $this;
$installer->startSetup();
$table = $installer->getConnection()
			->newTable($installer->getTable('user/user'))
			->addColumn('id',Varien_Db_Ddl_Table::TYPE_INTEGER,11,[
				'nullable' => false,
				'primary' => true,
				'identity' => true
			],'id')
			->addColumn('name',Varien_Db_Ddl_Table::TYPE_VARCHAR,20,[
				'nullable' => false
			],'name')
			->addColumn('age',Varien_Db_Ddl_Table::TYPE_INTEGER,3,[
				'nullable' => false
			],'age')
			->addColumn('email',Varien_Db_Ddl_Table::TYPE_VARCHAR,25,[
				'nullable' => false
			],'email');
$installer->getConnection()->createTable($table);
$installer->endSetup();
?>