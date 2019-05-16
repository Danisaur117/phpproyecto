<?php
 namespace App;

 class SessionManager
 {

    public static function put($variable, $value)
    {
        $_SESSION[$variable] = serialize($value);

    }

    public static function get($variable)
    {
        return unserialize($_SESSION[$variable]);
    }

 }