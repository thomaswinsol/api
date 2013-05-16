<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function loginAction()
    {
        $loginform = new Application_Form_Login();
        $this->view->form = $loginform;
        
        if ($this->getRequest()->getPost()) {
            $postParams = $this->getRequest()->getPost();
            
            if ($this->view->form->isValid($postParams)) {
                
                $params = $this->view->form->getValues();
                $auth = Zend_Auth::getInstance();
                
                // meegeven welke database driver we gebruiken
                $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Registry::get('db'));
               
                $authAdapter->setTablename('users')
                             ->setIdentityColumn('username')
                             ->setCredentialColumn('password')
                             ->setIdentity($params['login'])
                             ->setCredential($params['password']);

                $result = $auth->authenticate($authAdapter);
                
                If ($result->isValid()) {
                        echo "U bent ingelogd";
                }
                else {
                       // alle foutmeldingen weergeven op het scherm
                       foreach ($result->getMessages() as $message) {
                           echo $message;
                       }
                }
            }
        }
    }

    
     public function logoutAction()
     {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        Zend_Auth::getInstance()->clearIdentity();
        $this->_helper->redirector('login','user');
     }

}



