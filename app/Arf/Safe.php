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

    public static function text(string $dangerousText)
    {
        // Not implemented
    }

    public static function url(string $dangerousURL)
    {
        // Not implemented
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
        $CSRFToken = $_SESSION['csrf_token'];
        View::render('Components/CSRFToken', ['csrf_token' => $CSRFToken]);
    }
}