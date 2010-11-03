<?php
class Bootstrap
{
    public $registry;
    public function initAutoloader()
    {
        require_once(APPLICATION_PATH.'/../library/Mnl/Loader.php');
        Mnl_Loader::registerAutoload();

        Mnl_Loader_Paths::getInstance()->registerPath(
            'library',
            APPLICATION_PATH.'/../library/'
        );
       
        Mnl_Loader_Paths::getInstance()->registerPath(
            'models',
            APPLICATION_PATH.'/models/'
        );
    }

    public function setupRegistry()
    {
        $this->registry = Mnl_Registry::getInstance();
    }
    
    public function initView()
    {
        $this->registry->templatePath = APPLICATION_PATH.'/views/';
        
        Mnl_View_Helper_Loader::getInstance()->registerHelperPath(
            'Mnl_View_Helper_', 
            APPLICATION_PATH.'/../library/Mnl/View/Helper/'
        );
    }

    public function deployRouter()
    {
        Mnl_Registry::getInstance()->defaultControllerPath = "controllers";
        define('defaultAction',"index");
        define('defaultController',"Default");
        define('BASE_URL', webLocation);
        $router = new Mnl_Router();
        
    }

    public static function run()
    {
        $bootstrapper = new self;
        $bootstrapper->initAutoloader();
        $bootstrapper->setupRegistry();
        $bootstrapper->initView();
        $bootstrapper->deployRouter();
    }
}
