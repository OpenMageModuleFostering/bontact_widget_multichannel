<?php
class Bontact_Widget_AdminController extends Mage_Adminhtml_Controller_Action
{
    public function accountconfigAction()
    {
		$this->loadLayout()
			->_addContent($this->getLayout()->createBlock('bontact/accountconfig'))
			->renderLayout();
    }

    public function dashboardAction()
    {
		 $this->_redirectUrl('https://dashboard.bontact.com');
    }

    

    public function indexAction()
    {
       accountconfigAction();
    }
}
