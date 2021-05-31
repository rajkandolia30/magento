<?php 
class Ccc_User_Adminhtml_UserController  extends Mage_Adminhtml_Controller_Action{
	
	public function _initAction(){
		$this->loadLayout();
		$this->_setActiveMenu('user');
	}

	public function gridAction(){
		$this->_initAction();
		$block = $this->getLayout()->createBlock('user/adminhtml_user');
		$this->_addContent($block);
		$this->renderLayout();
	}

	public function newAction(){
		$this->_forward('edit');
	}

	public function editAction(){
		try {
			$this->_initAction();
			$block = $this->getLayout()->createBlock('user/adminhtml_user_edit');
			$this->_addContent($block);
			$id = $this->getRequest()->getParam('id');
			$model = Mage::getModel('user/user')->load($id);
			if($id && !$model->getId()){
				throw new Exception("Invalid Id");				
			}
			Mage::register('user_data',$model);
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			$this->_forward('grid');		
		}
		$this->renderLayout();
	}

	public function saveAction(){
		try {
			if(!$this->getRequest()->isPost()){
				throw new Exception("Invalid request");
			}
			$id = $this->getRequest()->getParam('id');
			$model = Mage::getModel('user/user')->load($id);
			if($id && !$model->getId()){
				throw new Exception("Invalid Id");				
			}
			$data = $this->getRequest()->getPost('user');
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
			$model = Mage::getModel('user/user')->load($id);
			if($id && !$model->getId()){
				throw new Exception("Invalid Id");				
			}
			if(!$model->delete()){
				throw new Exception("Somthing went wrong");
			}
			Mage::getSingleton('adminhtml/session')->addSuccess("Record deleted succesfully");
		} catch (Exception $e) {
			
		}
		$this->_forward('grid');
	}
}
?>