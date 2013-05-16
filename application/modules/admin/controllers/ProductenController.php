<?php

class Admin_ProductenController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        die('ik zit in de admin module!');
    }
    
    public function addAction()
    {
        
        $form = new Application_Form_Product($id);
        
        $this->_helper->layout()->disableLayout();        
        $this->_helper->viewRenderer->setNoRender(true);
        
        
        $productModel = new Admin_Model_Producten();        
        $productModel->addProducts('titel', 'omschrijving', '15');        
    }        
    
    
    public function deleteAction()
    {
        $this->_helper->layout()->disableLayout();        
        $this->_helper->viewRenderer->setNoRender(true);
        $productModel = new Admin_Model_Producten();  
        $productModel->deleteProducts(1);    
    }
    

    


}

