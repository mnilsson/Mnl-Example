<?php

require_once(APPLICATION_PATH.'/../library/Mnl/library/Mnl/Loader.php');

class Bootstrap
{
    public function initAutoloader()
    {
        $autoloader = new Mnl\Loader();

        $autoloader->registerPath(APPLICATION_PATH.'/../library/Mnl/library/');
        $autoloader->registerPath(APPLICATION_PATH.'/models/');
       
        $autoloader->registerAutoload();
    }

    public function setupRegistry()
    {
        $this->registry = Mnl\Registry::getInstance();
    }
    
    public function initView()
    {
        \Mnl\View::setTemplateDirectory(APPLICATION_PATH.'/views');


        \Mnl\View\Helper\Loader::getInstance()->registerHelperPath(
            'Mnl\View\Helper\\',
            APPLICATION_PATH.'/../library/Mnl/library/Mnl/View/Helper/'
        );
    }

    public function deployRouter($request)
    {
        Mnl\Registry::getInstance()->defaultControllerPath = "controllers";

        define('BASE_URL', '/');

        $request = substr($request, strlen(','));
        $router = new \Mnl\Router();

        include (APPLICATION_PATH.'/routes.php');

        $router->setRoutes($collection);
        $router->setControllerDirectory('controllers');
        $router->run($request);
    }

    public static function run()
    {
        $bootstrapper = new self;
        $bootstrapper->initAutoloader();
        $bootstrapper->setupRegistry();
        $bootstrapper->initView();
    }
}
