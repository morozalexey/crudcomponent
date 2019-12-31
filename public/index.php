<?php

if( !session_id() ) @session_start();
require '../vendor/autoload.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', ['App\controllers\PagesController', 'index']);
    $r->addRoute('GET', '/profile', ['App\controllers\PagesController', 'profile']);
    $r->addRoute('GET', '/login_page', ['App\controllers\PagesController', 'login_page']);
    $r->addRoute('GET', '/registration_page', ['App\controllers\PagesController', 'registration_page']);
    $r->addRoute('POST', '/registration', ['App\controllers\MainController', 'registration']);
    $r->addRoute('POST', '/login', ['App\controllers\MainController', 'login']);
    $r->addRoute('GET', '/logout', ['App\controllers\MainController', 'logout']);
    $r->addRoute('GET', '/verify_email', ['App\controllers\MainController','email_verification']);
    $r->addRoute('GET', '/admin', ['App\controllers\PagesController', 'admin']);
    $r->addRoute('GET', '/show', ['App\controllers\MainController', 'show']);
    $r->addRoute('GET', '/hide', ['App\controllers\MainController', 'hide']);
    $r->addRoute('GET', '/delete', ['App\controllers\MainController', 'delete']);
    $r->addRoute('POST', '/new_сomment', ['App\controllers\MainController', 'new_сomment']);
    $r->addRoute('POST', '/change_password', ['App\controllers\MainController', 'change_password']);
    $r->addRoute('POST', '/edit_profile', ['App\controllers\MainController', 'edit_profile']);
    
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo "404 Not Found";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo "405 Method Not Allowed";       
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $controller = new $handler[0];
        call_user_func([$controller, $handler[1]], $vars);
        break;
}