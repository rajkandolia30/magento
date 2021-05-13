<?php
$this->startSetup();
$this->addEntityType(Ccc_Vendor_Model_Resource_Vendor::ENTITY, [
    'entity_model'                => 'vendor/vendor',/*model name,add->group,set*/
    'attribute_model'             => 'vendor/attribute',/*attribute specific show all attribute*/
    'table'                       => 'vendor/vendor',/*table name*/
    'increment_per_store'         => '0',
    'additional_attribute_table'  => 'vendor/eav_attribute',/*additional attribute table*/
    'entity_attribute_collection' => 'vendor/vendor_attribute_collection',
]);
$this->createEntityTables('vendor');
$this->installEntities();/*defaul entities set*/
$default_attribute_set_id = Mage::getModel('eav/entity_setup', 'core_setup')
    						->getAttributeSetId('vendor', 'Default');/*defaulf attribute set id*/

$this->run("UPDATE `eav_entity_type` SET `default_attribute_set_id` = {$default_attribute_set_id} WHERE `entity_type_code` = 'vendor'");

$this->endSetup();
