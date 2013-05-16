<?php

class Admin_WebserviceController extends Zend_Controller_Action
{

    public function clientAction()
    {       
        $this->_helper->layout()->disableLayout();        
        $this->_helper->viewRenderer->setNoRender(true);
        $client= new Zend_Soap_Client('http://192.168.33.95/admin/webservice/server?wsdl');
      
        $client->setSoapVersion(SOAP_1_1); // normaal is het 1.2  voor Zend
        $client->addProducts('titel','omschrijving', 15);       
    
    }

    public function serverAction()
    {
        $this->_helper->layout()->disableLayout();        
        $this->_helper->viewRenderer->setNoRender(true);
        
        $wsdl = $this->_getParam('wsdl');
        if (isset($wsdl)) {
            $server = new Zend_Soap_AutoDiscover();
            $server->setClass('Admin_Model_Producten');
            $server->handle();       
            
        }
        else {
            $server = new Zend_Soap_Server();
            $server->setClass('Admin_Model_Producten');
            $server->setObject(new Admin_Model_Producten('http://192.168.33.95/admin/webservice/server?wsdl'));
            $server->handle();
        }
        
    }


}

