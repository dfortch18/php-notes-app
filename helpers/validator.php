<?php

function validateEmail($email) {
    if (validateString($email) != '') {
        return validateString($email);
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 'The field must be an email';
    }
}

function validateString($str) {
    if (empty($str)) {
        return 'The field must not be empty';
    }

    if (is_numeric($str)) {
        return 'The field must not be numeric';
    }
}

function validateMinLength($str, $length) {
    if (empty($str) || strlen($str) < $length) {
        return 'The field must have at least '.$length.' characters';
    }
}

