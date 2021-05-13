<?php 
class Ccc_EavModule_Model_Resource_EavModule extends Mage_Eav_Model_Entity_Abstract{
	public function __construct(){
		$this->setType('ccc_eav_entity');
		$resource = Mage::getSingleton('core/resource');
		$this->setConnection($resource->getConnection('eav_module_read'), $resource->getConnection('eav_module_write'));
	}
}
?>