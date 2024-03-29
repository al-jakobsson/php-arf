<?php

namespace Arf;

use Exception;

class Session
{
    public function __construct()
    {
        $this->startSession();
        $this->generateCSRFToken();
    }

    private function startSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    private function generateCSRFToken(): void
    {
        if (!isset($_SESSION['csrf_token'])) {
            try {
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            } catch (Exception $e) {
                echo "Couldn't generate CSRF token: $e";
            }
        }
    }

    public static function getCSRFToken(): mixed
    {
        return $_SESSION['csrf_token'] ?? null;
    }

    public static function validCSRFToken(): bool
    {
        return
            isset($_SESSION['csrf_token'], $_POST['csrf_token'])
            && $_POST['csrf_token']  === $_SESSION['csrf_token'];
    }

}