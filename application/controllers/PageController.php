<?php

class PageController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        //$lang = Zend_Registry::get('Zend_Locale');
        $lang = $this->_getParam('lang');
        $slug = $this->_getParam('slug');
        //var_dump($this->getAllParams());
        
        
        $pageModel = new Application_Model_Page();
        $page= $pageModel->getPage($slug, $lang);
        
        $this->view->title = $page['title'];
        $this->view->description = $page['description'];        
    }
    
    
    


}

