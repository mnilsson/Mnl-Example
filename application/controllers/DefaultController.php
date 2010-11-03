<?php
class DefaultController extends Mnl_Controller
{
    public function indexAction()
    {
        $this->_view->assign('hello', 'world');
    }
}
