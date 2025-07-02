<?php

namespace Sfy\AplikasiDataKemenagPAI\Helpers;

class SessionHelper
{
    public static function startSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function isLoggedIn(): bool
    {
        return isset($_SESSION['user']);
    }

    public static function destroy(): void
    {
        session_destroy();
    }

    public static function getUser(): ?array
    {
        return $_SESSION['user'] ?? null;
    }
    public static function getUsername(): ?string
    {
        return $_SESSION['user']['username'] ?? null;
    }
    public static function getId(): ?string
    {
        return $_SESSION['user']['id'] ?? null;
    }
    public static function getRole(): ?string
    {
        return $_SESSION['user']['role'] ?? null;
    }
}