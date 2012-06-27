<?php
use Mnl\Router\Route;
$collection = new Mnl\Router\RouteCollection();

$collection->add('root', new Route('', 'default#index'));
