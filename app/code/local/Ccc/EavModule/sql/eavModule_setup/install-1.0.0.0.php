<?php 
$installer = $this;
$installer->startSetup();
$installer->addEntityType('ccc_eav_entity',[
		'entity_model' => 'eavmodule/eavmodule',	/*model name*/
		'attribute_model' => '',
		'table' => 'eavmodule/eavmodule'
	]);
$installer->endSetup();
?>