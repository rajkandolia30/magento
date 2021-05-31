<?php 
class Ccc_Raj_Block_System1_Account_Edit extends Mage_Adminhtml_Block_Widget_Form_Container{

	public function __construct(){
		parent::__construct();
        $this->_controller = 'system1_account';
        $this->_updateButton('save', 'label', 'Save Account');
        $this->_removeButton('delete');
        $this->_removeButton('back');
	}
}
?>