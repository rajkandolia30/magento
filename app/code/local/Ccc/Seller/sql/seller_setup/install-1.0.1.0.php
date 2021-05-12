<?php 
$this->startSetup();
$this->addEntityType('seller', [
	'entity_model'                => 'seller/seller',
    'attribute_model'             => 'seller/attribute',
    'table'                       => 'seller/seller',
    'increment_per_store'         => '0',
    'additional_attribute_table'  => 'seller/eav_attribute',
    'entity_attribute_collection' => 'seller/seller_attribute_collection',
]);
$this->createEntityTables('seller');
$this->installEntities();
$this->endSetup();
?>