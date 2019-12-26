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




/*

$sql = "SELECT comments.dt_add, comments.name, comments.text, users.avatar FROM comments, users WHERE users.id = comments.user_id AND show_comment=1 ORDER BY comments.dt_add DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SESSION['messageSuccess']) {
    $messageSuccess = "<div class=\"alert alert-success\" role=\"alert\">Комментарий успешно добавлен </div>";
  unset($_SESSION['messageSuccess']);
}

if ($_SESSION ['textErrorMessage']){
    $textErrorMessage = "<div class=\"alert alert-danger\" role=\"alert\">Это поле надо заполнить</div>";
    unset($_SESSION['textErrorMessage']);
}

if ($_SESSION ['nameErrorMessage']){
    $nameErrorMessage = "<div class=\"alert alert-danger\" role=\"alert\">Это поле надо заполнить</div>";
    unset($_SESSION['nameErrorMessage']);
}

$user_id = $_SESSION['user']['id'];

$admin_role = $pdo->prepare("SELECT * FROM users WHERE id =?");
$admin_role->execute([$user_id]); 
$admin_result = $admin_role->fetch(PDO::FETCH_ASSOC);

?>

*/