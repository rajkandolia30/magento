<?php 
class Ccc_Raj_IndexController extends Mage_Core_Controller_Front_Action{
 	public function indexAction(){
 		echo 124;
 	}

 	public function newAction(){
 		$this->loadLayout();
 		/*echo 'newAction';
 		echo Zend_Debug::dump($this->getLayout()->getUpdate()->getHandles());*/
 		$this->renderLayout();

 	}

 	public function testAction(){
 		echo '<pre>';
 		$model = Mage::getModel('raj/raj');
 		$data = [
 			/*'name' => 'xyz',*/
 			'email' => 'xyz@gmail.com'
 		];
 		// $model->setData($data);
 		// print_r($model);
 		// $model->save(); 

 		$model->load(2);
 		// $model->mobile = 1237878;
 		// $model->save();
 		// print_r($model);
 		
 		// echo $model->getEmail();
 		// $model->setEmail('Eamail@email.com');
 		// $model->save();

 		$model->setEmail('Abcd@gmail.com');
 		$model->setName('abcds');
 		print_r($model);

 		// $model->addData($data);

 		$model->setData();/*only updates sibgle value*/

 		print_r($model);
 		// print_r($model->getCollection()->getData());
 	}
} ?>