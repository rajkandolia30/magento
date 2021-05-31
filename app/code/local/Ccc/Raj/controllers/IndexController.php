<?php 
class Ccc_Raj_IndexController extends Mage_Core_Controller_Front_Action{

 	public function test2Action(){
 		// echo '<pre>';
 		$this->loadLayout();
 		// echo 11;
 		$this->renderLayout();
 		// $model = Mage::getModel('core/config_data')->getCollection()->getData();
 		/*$model = Mage::getSingleton('adminhtml/config_data');
 		print_r($model);
 		die();
*/

 	public function indexAction(){
 		echo '<pre>';

 		// $class = new Mage_Core_Model_Resource();
 		// print_r(get_class_methods($class));

 		// print_r(get_class_methods(get_parent_class()));

 		// print_r(get_class_methods(get_class()));
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

 	public function indexAction(){
 		$this->loadLayout();
 		/*echo 'newAction';
 		echo Zend_Debug::dump($this->getLayout()->getUpdate()->getHandles());*/
 		$this->renderLayout();
 	}

 	public function newAction(){
 		$this->loadLayout();
 		echo "new action";
 		$this->renderLayout();
 	}

 	public function editAction(){
 		$this->loadLayout();
 		echo "edit action";
 		$this->renderLayout();
 	}

 	public function deleteAction(){
 		$this->loadLayout();
 		$id = $this->getRequest()->getParam('id');
 		echo $id;
 		echo "delete action";
 		$this->renderLayout();
 	}
}?>

