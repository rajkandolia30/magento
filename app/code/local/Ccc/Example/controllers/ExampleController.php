<?php 
class Ccc_Example_ExampleController extends Mage_Core_Controller_Front_Action{
	public function testAction(){
		echo 'Test Action';
		$example = Mage::getModel('example/example');
		echo '<pre>';
		$example->setName('meet');
		$example->setEmail('meet@gmail.com');
		// print_r($example);

		$data = [
			//'name' => 'smith',
			'email' => 'smith@gmail.com',
			'mobile' => 2356789
		];

		print_r($example->setData($data));
		print_r($example->addData($data));
	}
}
?>	