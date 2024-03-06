<?php

function setFlashMessage($key, $message) {
    $_SESSION[$key] = $message;
}

function getFlashMessage($key) {
    $message = isset($_SESSION[$key]) ? $_SESSION[$key] : '';
    unset($_SESSION[$key]);
    return $message;
}

function getOldField($key, $field) {
    $fullKey = str_ends_with($key, '_old_fields') ? $key : $key.'_old_fields';

    if (isset($_SESSION) && isset($_SESSION[$fullKey])) {
        return isset($_SESSION[$fullKey][$field]) ? $_SESSION[$fullKey][$field] : '';
    }
    return '';
}

function getInvalidFeedback($key, $field) {
    $fullKey = str_ends_with($key, '_errors') ? $key : $key.'_errors';

    if (isset($_SESSION) && isset($_SESSION[$fullKey])) {
        return isset($_SESSION[$fullKey][$field]) ? $_SESSION[$fullKey][$field] : '';
    }
    return '';
}

function showIsInvalidClass($key, $field) {
    $fullKey = str_ends_with($key, '_errors') ? $key : $key.'_errors';

    if (isset($_SESSION) && isset($_SESSION[$fullKey])) {
        return isset($_SESSION[$fullKey][$field]) ? 'is-invalid' : '';
    }
    return '';
}