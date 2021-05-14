<?php 
$installer = $this;
$installer->startSetup();
$installer->run("ALTER TABLE {$installer->getTable('raj/raj')} ADD mobile varchar(10);");
$installer->endSetup();
?>