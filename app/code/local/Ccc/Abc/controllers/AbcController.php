<?php 
class Ccc_Abc_AbcController extends Mage_Core_Controller_Front_Action{
	public function testAction(){
		$model = Mage::getModel('abc/abc');
		echo '<pre>';
		print_r($model->getCollection());	
	}
}
?>