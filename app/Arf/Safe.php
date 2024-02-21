<?php

namespace Arf;

class Safe
{
    /**
     * Convert special characters to HTML entities to prevent XSS attacks.
     * @param string $string
     * @param int $flags
     * @param string $encoding
     * @param bool $double_encode
     * @return string
     */
    public static function html(
        string $string, int $flags = ENT_QUOTES, string $encoding = 'UTF-8', bool $double_encode = true
    ): string
    {
        return htmlspecialchars($string, $flags, $encoding, $double_encode);
    }

    /**
     * Return a URL-encoded parameter string
     */
    public static function param($string): string
    {
        return urlencode($string);
    }

    /**
     * Render a hidden input with the session CSRF token to prevent Cross-Site Forgery Attacks
     * @return void
     */
    public static function csrf(): void
    {
        $csrf_token = $_SESSION['csrf_token'];
        View::render('components/csrf_token', ['csrf_token' => $csrf_token]);
    }
}