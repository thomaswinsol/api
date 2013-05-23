<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initRegisterControllerPlugins()
    {
        $this->bootstrap('frontController');
        $front = $this->getResource('frontController');
        //$front->registerPlugin(new Syntra_Controller_Plugin_Translate());
        //$front->registerPlugin(new Syntra_Controller_Plugin_Navigation());
        //$front->registerPlugin(new Syntra_Auth_Acl());
        //$front->registerPlugin(new Syntra_Auth_Auth());
    }    
    
    
    public function _initDbAdapter()
    {
        $this->bootstrap('db');
        $db = $this->getResource('db');
        // maak een soort van globale variabele 
        Zend_Registry::set('db',$db);        
    }
    
    /**
     * 
     * put after _initView
     * Creates all custom routes
     * return Zenc_Controller_Router_Route
     * @param array $option
     */
      
     
   /* public function _initRouter(array $option =null)
    {
       $router = $this->getResource('frontcontroller')->getRouter();
       
       // add custom route
       // : before param = get var
       $router->addRoute('lang', 
            new Zend_Controller_Router_Route(':lang', array (                
              'controller'=> 'index',
              'action'    => 'index'
            )));

       $router->addRoute('login', 
            new Zend_Controller_Router_Route(':lang/login', array (                
              'controller'=> 'user',
              'action'    => 'login'
            )));
       
       $router->addRoute('logout', 
            new Zend_Controller_Router_Route(':lang/logout', array (                
              'controller'=> 'user',
              'action'    => 'logout'
            )));
       
       $router->addRoute('page', 
            new Zend_Controller_Router_Route(':lang/pagina/:slug', array (                
              'controller'=> 'page',
              'action'    => 'index'
            )));
       
       $router->addRoute('admin', 
            new Zend_Controller_Router_Route('admin/:controller/:action', array ( 
              'module'    => 'admin',
              'controller'=> 'index',
              'action'    => 'index'
            )));
       
        $router->addRoute('api', 
            new Zend_Controller_Router_Route('api/:controller/:action', array ( 
              'module'    => 'Api',
              'controller'=> 'Page',
              'action'    => 'index'
            )));
       
       
       $router->addRoute('noaccess', 
            new Zend_Controller_Router_Route('noaccess', array ( 
              'controller'=> 'noaccess',
              'action'    => 'index'
            )));
       
        
    }*/
    
    protected function _initRestRoute()
    {
        // Alle controllers binnen Api modulen , worden hierdoor API REST Controllers
        // Nodig get / post / put / delete action om dit te laten werken ! 
        $this->bootstrap('frontcontroller');
        $frontController = Zend_Controller_Front::getInstance();
        $restRoute = new Zend_Rest_Route($frontController, array(), array('Api'));
        $frontController->getRouter()->addRoute('rest',$restRoute);
        
    }
    
}

