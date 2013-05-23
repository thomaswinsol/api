<?php

class ApiController extends Zend_Controller_Action
{

   public function init()
    {
        $this->_helper->viewRenderer->setNoRender(true);
        $this->_helper->layout->disableLayout();
    }
   
   public function clientAction()
    {
        $client = new Zend_Http_Client();
        
        $post = array('field'=> 'value');
        $client->setUri('http://localhost:8010/Api/Page');   
        $client->setParameterPost($post);
        //$client->setParameterGet('1');
        //$client->setEncType(Zend_Http_Client::ENC_URLENCODED);
        $response = $client->request('POST');
        //echo $response->getBody();
        var_dump($response);
        
   }
           

}

