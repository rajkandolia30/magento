<?php
class Ccc_Raj_Helper_Data extends Mage_Core_Helper_Abstract {
	
	public function getRajUrl(){
		return $this->_getUrl('raj/index/test2');/*module/controller/action*/
	}
}