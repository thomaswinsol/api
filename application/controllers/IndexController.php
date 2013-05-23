<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        //var_dump($this->getAllParams());
    }
    
    public function apiclientAction()
    {
        $client = new Zend_Rest_Client('http://localhost:8010/api/');
        $response = $client->request();
      
    }        


}

