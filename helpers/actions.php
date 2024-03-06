<?php

function redirectTo($url) {
    header("Location: $url");
}

function buildUrl($path) {
    return "index.php?route=$path";
}

function route($name) {
    global $routes;

    foreach ($routes as $route) {
        if (isset($route['name']) and $route['name'] == $name) {
            if (isset($route['path'])) {
                $path = $route['path'];

                if (isset($route['method']) && in_array($route['method'], ['DELETE', 'PUT'])) {
                    $method = $route['method'];
                    $path .= "&_method=$method";
                }

                return buildUrl($path);
            }
        }
    }
}

function asset($file) {
    return 'assets/'.$file;
}