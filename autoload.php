<?php

$helpers = [
    'actions.php',
    'validator.php',
    'session.php'
];

foreach ($helpers as $helper) {
    $helperPath = 'helpers/'.$helper;
    if (is_readable($helperPath)) {
        require $helperPath;
    }
}

spl_autoload_register(function ($class_name) {
    $filename = 'models/'.$class_name.'.php';
    $abstractFilename = 'models/'.$class_name.'.abstract.php';

    if (is_readable($filename)) {
        require $filename;
    }

    else if (is_readable($abstractFilename)) {
        require $abstractFilename;
    }
});

spl_autoload_register(function ($class_name) {
    $filename = 'controllers/'.$class_name.'.php';

    if (is_readable($filename)) {
        require $filename;
    }
});