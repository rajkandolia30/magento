<?php 
class Ccc_Seller_Adminhtml_SellerController extends Mage_Adminhtml_Controller_Action{

	protected function _isAllowed(){
        return Mage::getSingleton('admin/session')->isAllowed('seller/seller');
    }

	public function indexAction(){
		$this->loadLayout();
		$this->_setActiveMenu('seller');
		$block = $this->getLayout()->createBlock('seller/adminhtml_seller');
		$this->_addContent($block);
		$this->renderLayout();
	}
 
	public function _initSeller(){
		$id = (int) $this->getRequest()->getParam('id');
        $seller   = Mage::getModel('seller/seller')
            ->setStoreId($this->getRequest()->getParam('store', 0))
            ->load($id);
        Mage::register('current_seller', $seller);
        Mage::getSingleton('cms/wysiwyg_config')->setStoreId($this->getRequest()->getParam('store'));
        return $seller;
	}

	public function newAction(){
		$this->_forward('edit');
	}

	public function editAction(){
		try {
			$this->loadLayout();
			$this->_setActiveMenu('seller');
			$seller = $this->_initSeller();
			if ($id && !$seller->getId()) {
            	$this->_getSession()->addError(Mage::helper('seller')->__('This seller no longer exists.'));
            	$this->_redirect('*/*/');
           	}
			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
			$this->renderLayout();			
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			$this->_redirect('*/*/index');
		}
	}

	public function saveAction(){
		try {
			if(!$this->getRequest()->isPost()){
				throw new Exception("Invalid request");				
			}
			$id = $this->getRequest()->getParam('id');
			$model = Mage::getModel('seller/seller')->load($id);
			if($id && !$model->getId()){
				throw new Exception("invalid Id");
				$this->_redirect('*/*/index');			
			}
			$data = $this->getRequest()->getPost('seller');
			$model->addData($data)->save();
			$message = $id ? "Record updated succefully" : "Record inserted succesfully" ;
			Mage::getSingleton('adminhtml/session')->addSuccess($message);
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
		}
		$this->_redirect('*/*/index');
	}

	public function deleteAction(){
		try {
			$id = $this->getRequest()->getParam('id');
			$model = Mage::getModel('seller/seller')->load($id);
			if(!$id){
				throw new Exception("Id not found");	
				$this->_forward('index');			
			}
			if($id && !$model->getId()){
				throw new Exception("No longer exist");
				$this->_forward('index');			
			}
			if(!$model->delete()){
				throw new Exception("Something Went Wrong Deleting record");
				$this->_forward('index');			
			}
			Mage::getSingleton('adminhtml/session')->addSuccess("Record deleted succesfully");
		} catch (Exception $e) {
			Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
		}
		$this->_redirect('*/*/index');
	}
}
?>
