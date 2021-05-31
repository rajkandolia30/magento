<?php 
class Ccc_Raj_Adminhtml_RajController extends Mage_Adminhtml_Controller_Action{
	
	public function _initAction(){
		$this->loadLayout();
		$this->_setActiveMenu('raj');/*for orange hover*/
	}

	public function gridAction(){
		$this->_initAction();
		$block = $this->getLayout()->createBlock('raj/adminhtml_raj');
		$this->_addContent($block);	
		$this->renderLayout();
	}

	public function newAction(){
		$this->_forward('edit');
		/*$model = Mage::getModel('catalog/product');
		echo '<pre>';
		print_r($model);
		die();*/
	}

	public function editAction(){
		try {
			$this->_initAction();
			$id = $this->getRequest()->getParam('id');
			$model = Mage::getModel('raj/raj')->load($id);
			if($id && !$model->getId()){
				throw new Exception("Invalid Id");
			}
			Mage::register('raj_data',$model);			
			$block = $this->getLayout()->createBlock('raj/adminhtml_raj_edit');
			$this->_addContent($block);	
			$tabs = $this->getLayout()->createBlock('raj/adminhtml_raj_edit_tabs');
			$this->_addLeft($tabs);	
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			$this->_redirect('*/*/grid');	
		}
		$this->renderLayout();
	}

	public function saveAction(){
		try {
			if(!$this->getRequest()->isPost()){
				throw new Exception("invalid request");				
			}
			$id = $this->getRequest()->getParam('id');
			$model = Mage::getModel('raj/raj')->load($id);
			if($id && !$model->getId()){
				throw new Exception("Invalid Id");
			}		
			$data  = $this->getRequest()->getPost('raj');
			$model->addData($data)->save();
			$message = $id ? "Record updated succesfully" : "New record added succesfully" ;
			Mage::getSingleton('adminhtml/session')->addSuccess($message);	
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
		}
		$this->_redirect('*/*/grid');
	} 

	public function deleteAction(){
		try {
			$id = $this->getRequest()->getParam('id');
			$model = Mage::getModel('raj/raj')->load($id);
			if($id && !$model->getId()){
				throw new Exception("Invalid Id");
			}
			if(!$model->delete()){
				throw new Exception("Somthing went Wrong");					
			}
			Mage::getSingleton('adminhtml/session')->addSuccess("Record deleted succesfully");		
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
		}
		$this->_redirect('*/*/grid');		
	}
}?>