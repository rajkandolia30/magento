<?php 
class Ccc_Example_Adminhtml_ExampleController extends Mage_Adminhtml_Controller_Action{
	
	public function _initAction(){
		$this->loadLayout();
		$this->_setActiveMenu('example');
	}

	public function gridAction(){
		$this->_initAction();
		$block = $this->getLayout()->createBlock('example/adminhtml_example');
		$this->_addContent($block);	
		$this->renderLayout();
	}

	public function newAction(){
		$this->_forward('edit');
	}

	public function editAction(){
		try {
			$id = $this->getRequest()->getParam('id');
			$model = Mage::getModel('example/example')->load($id);
			if($id && !$model->getId()){
				throw new Exception("invalid id");				
			}
			Mage::register('example_data',$model);
			$this->_initAction();
			$block = $this->getLayout()->createBlock('example/adminhtml_example_edit');
			$this->_addContent($block);
			$tab = $this->getLayout()->createBlock('example/adminhtml_example_edit_tabs');
			$this->_addLeft($tab);
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
		}
		$this->renderLayout();
	}

	public function saveAction(){
		try {
			if(!$this->getRequest()->isPost()){
				throw new Exception("invalid request");
			}
			$id = $this->getRequest()->getParam('id');
			$model = Mage::getModel('example/example')->load($id);
			if($id && !$model->getId()){
				throw new Exception("invalid id");				
			}
			$data = $this->getRequest()->getPost('example');	
			$model->addData($data)->save();
			$message = $id ? "Record updated succesfully" : "Record inserted succesfully";
			Mage::getSingleton('adminhtml/session')->addSuccess($message);
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
		}
		$this->_forward('grid');
	}

	public function deleteAction(){
		try {
			$id = $this->getRequest()->getParam('id');
			$model = Mage::getModel('example/example')->load($id);
			if($id && !$model->getId()){
				throw new Exception("invalid id");				
			}
			if(!$model->delete()){
				throw new Exception("Somthing went wrong");
			}
			Mage::getSingleton('adminhtml/session')->addSuccess("Record deleted succesfully");
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
		}
		$this->_forward('grid');
	}
}?>