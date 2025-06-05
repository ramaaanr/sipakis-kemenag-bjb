<?php

namespace Sfy\AplikasiDataKemenagPAI\Helpers;

class SessionHelper
{
    public static function startSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function isUserLoggedIn()
    {
        return isset($_SESSION['id_user']);
    }
    public static function getUsername()
    {
        return $_SESSION['user_username'];
    }
    public static function getRole()
    {
        return $_SESSION['role'];
    }
    public static function isKepalaLab()
    {
        return $_SESSION['role'] == 'kepala_lab';
    }
}