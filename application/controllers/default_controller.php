<?php
class DefaultController extends Mnl\Controller
{
    public function index()
    {
        $this->_view->assign('hello', 'world');
    }
}
