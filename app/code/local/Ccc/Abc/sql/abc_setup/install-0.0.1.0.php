<?php 
$installer = $this;
$installer->startSetup();
$installer->addEntityType('ccc_abc_entity',[
		'entity_model' => 'abc/abc',
		'attribute_model' => '',	
		'table' => 'abc/ccc_abc	_entity'
	]);
$installer->endSetup();
?>