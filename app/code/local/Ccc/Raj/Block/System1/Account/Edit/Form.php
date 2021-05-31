<?php 
class Ccc_Raj_Block_System1_Account_Edit_Form extends Mage_Adminhtml_Block_Widget_Form{

	public function _prepareForm(){
		$userId = Mage::getSingleton('admin/session')->getUser()->getId();
        $user = Mage::getModel('admin/user')
            ->load($userId);
        $user->unsetData('password');

        $form = new Varien_Data_Form();

        $fieldset = $form->addFieldset('base_fieldset', array('legend'=>'Account Information'));

        $fieldset->addField('username', 'text', array(
                'name'  => 'username',
                'label' => 'User Name',
                'title' => 'User Name',
                'required' => true,
            )
        );

        $fieldset->addField('firstname', 'text', array(
                'name'  => 'firstname',
                'label' => 'First Name',
                'title' => 'First Name',
                'required' => true,
            )
        );

        $fieldset->addField('lastname', 'text', array(
                'name'  => 'lastname',
                'label' => 'Last Name',
                'title' => 'Last Name',
                'required' => true,
            )
        );

        $fieldset->addField('user_id', 'hidden', array(
                'name'  => 'user_id',
            )
        );

        $fieldset->addField('email', 'text', array(
                'name'  => 'email',
                'label' => 'Email',
                'title' => 'User Email',
                'required' => true,
            )
        );

        $fieldset->addField('current_password', 'obscure', array(
                'name'  => 'current_password',
                'label' => 'Current Admin Password',
                'title' => 'Current Admin Password',
                'required' => true,
            )
        );

        $fieldset->addField('password', 'password', array(
                'name'  => 'new_password',
                'label' => 'New Password',
                'title' => 'New Password',
                'class' => 'input-text validate-admin-password',
            )
        );

        $fieldset->addField('confirmation', 'password', array(
                'name'  => 'password_confirmation',
                'label' => 'Password Confirmation',
                'class' => 'input-text validate-cpassword',
            )
        );

        $form->setValues($user->getData());
        
        // $form->setAction($this->getUrl('*/system1_account/save'));
        // $form->setMethod('post');
        // $form->setId('edit_form');

        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
	}
}
?>