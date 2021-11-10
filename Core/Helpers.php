<?php


function createCookie($name, $value, $options = []) {
    setcookie($name, $value, $options);
}

function getCookie($name) {
    return $_COOKIE[$name];
}

function destroyCookie($name) {
    setcookie($name, '', [
        'expires' => 0,
    ]);
}


function addToSession($name, $value) {
    $_SESSION[$name] = $value;
}

function removeFromSession($name) {
    unset($_SESSION[$name]);
}

function refreshSession() {
    session_destroy();
}
