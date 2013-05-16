<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth
 *
 * @author webmaster
 */
class Syntra_Auth_Auth extends Zend_Controller_Plugin_Abstract {
    //put your code here
    
    public function preDispatch(\Zend_Controller_Request_Abstract $request)   
    {
        
        $loginController = 'user';
        $loginAction     = 'login';
        $locale          = Zend_Registry::get('Zend_Locale');
        $auth            = Zend_Auth::getInstance();
        
        // If user is not logged in and is not requesting the login page
        // - redirect to login page
        if (!$auth->hasIdentity() && 
                $request->getControllerName() != $loginController
                 && $request->getActionName() != $loginAction)
        {
            $redirector =  Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
            /*$redirector->gotoUrl('/nl_BE/login');*/
        }
        
        
        // Indien Ingelogd !!!!!
        if ($auth->hasIdentity()){           
            //Zend_Auth::getInstance()->clearIdentity();
            //die("ok");
            $registry = Zend_Registry::getInstance();
            $acl      = $registry->get('Zend_Acl');
            // username
            $identity = $auth->getIdentity();
            
            
            $userModel = new Application_Model_User;
            $user = $userModel->getUserByIdentity($identity);
            $role = $user->role;
            //$role = $user['role'];
            //
            // role is een veld binnen onze usertabel
            If ($request->getModuleName() !== NULL && $request->getModuleName() !== 'default') {  
                 //die($request->getModuleName());
                 $isAllowed = $acl->IsAllowed($role, 
                               $request->getModuleName(). ':'.
                               $request->getControllername(), 
                               $request->getActionName());
            }
            else {
                 $isAllowed = $acl->IsAllowed($role, 
                               $request->getControllername(), 
                               $request->getActionName());
            }
            
                if (!$isAllowed) {
                    $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
                    $redirector->gotoUrl('/noaccess');
                }
            
            
        }
    }
            
}

?>
