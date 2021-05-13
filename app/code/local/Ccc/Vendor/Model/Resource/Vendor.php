<?php
class Ccc_Vendor_Model_Resource_Vendor extends Mage_Eav_Model_Entity_Abstract
{

	const ENTITY = 'vendor';/*eav_vendor_entity*/
	
	public function __construct()
	{

		$this->setType(self::ENTITY)
			 ->setConnection('core_read', 'core_write');

	   parent::__construct();
    }

}