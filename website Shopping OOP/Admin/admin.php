<?php
$controller = $_GET['controller'];
$action = $_GET['action'];
$controllerName = $controller .'Controller';
require '../controllers/'.$controllerName.'.php';
$controller = new $controllerName(); // su dung ten class
$controller->$action();