<?php

require 'constants.php';

$routes = [
    [
        'name' => 'index',
        'path' => '/',
        'action' => [MainController::class,'index']
    ],
    [
        'name' => 'home',
        'path' => HOME_ROUTE,
        'action' => [MainController::class,'index']
    ],
    [
        'name' => 'about',
        'path' => ABOUT_ROUTE,
        'action' => [MainController::class,'about']
    ],
    [
        'name' => 'login',
        'path' => LOGIN_ROUTE,
        'action' => [AuthController::class,'login']
    ],
    [
        'name' => 'login.process',
        'path' => LOGIN_ROUTE,
        'method' => 'POST',
        'action' => [AuthController::class,'loginProcess']
    ],
    [
        'name' => 'register',
        'path' => REGISTER_ROUTE,
        'action' => [AuthController::class,'register']
    ],
    [
        'name' => 'register.process',
        'path' => REGISTER_ROUTE,
        'method' => 'POST',
        'action' => [AuthController::class,'registerProcess']
    ],
    [
        'name' => 'logout',
        'path' => LOGOUT_ROUTE,
        'action' => [AuthController::class,'logout']
    ],
    [
        'name' => 'notes',
        'path' => NOTES_ROUTE,
        'auth' => true,
        'action' => [NotesController::class,'allNotes']
    ],
    [
        'name' => 'notes.add',
        'path' => ADD_NOTE_ROUTE,
        'auth' => true,
        'action' => [NotesController::class,'addNote']
    ],
    [
        'name' => 'notes.add.process',
        'path' => ADD_NOTE_ROUTE,
        'method' => 'POST',
        'auth' => true,
        'action' => [NotesController::class,'addNoteProcess']
    ],
    [
        'name' => 'notes.delete',
        'path' => NOTES_ROUTE,
        'method' => 'DELETE',
        'auth' => true,
        'action' => [NotesController::class,'deleteNote']
    ]
];

require_once 'autoload.php';

session_start();

if (!isset($_GET['route'])) {
    header('Location: index.php?route=/');
    exit;
}

$current_route = $_GET['route'];

foreach ($routes as $route) {
    $controller_str = $route['action'][0];
    $controller_method = $route['action'][1];

    // Default method : GET
    $route_method = isset($route['method']) ? $route['method'] : 'GET';

    $request_method = $_SERVER['REQUEST_METHOD'];

    $needs_auth = isset($route['auth']) ? $route['auth'] : false;

    $controller = new $controller_str;

    if ($route_method == 'DELETE' || $route_method == 'PUT') {
        $request_method = isset($_GET['_method']) ? $_GET['_method'] : 'GET';
    }

    if ($request_method != $route_method) continue;

    if (isset($route['path'])) {
        if ($current_route == $route['path']) {
            if ($needs_auth) {
                if (!isset($_SESSION['user'])) {
                    return redirectTo(LOGIN_ROUTE);
                } else {
                    try {
                        $controller->$controller_method();
                    } catch (Exception $err) {
                        http_response_code(500);
                        require_once 'views/500.php';
                    }
                    exit;
                }
            } else {
                try {
                    $controller->$controller_method();
                } catch (Exception $err) {
                    http_response_code(500);
                    require_once 'views/500.php';
                }
                exit;
            }
        }
    }
}

// Page 404
http_response_code(404);
require_once 'views/404.php';
