<?php
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__)).'/../application');


set_include_path(
    implode(PATH_SEPARATOR,
        array(
            get_include_path(),
            APPLICATION_PATH.'/../library'
        )
    )
);

require APPLICATION_PATH.'/bootstrap.php';
$bootstrap = new Bootstrap();
$bootstrap->run();
$bootstrap->deployRouter($_SERVER['REQUEST_URI']);


