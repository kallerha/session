<?php

declare(strict_types=1);

namespace FluencePrototype\Session;

/**
 * Class SessionService
 * @package FluencePrototype\Session
 */
class SessionService
{

    /**
     * @param string $name
     * @param string|int $value
     */
    public function set(string $name, string|int $value): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            $_SESSION[$name] = $value;
        }
    }

    /**
     * @param string $name
     */
    public function unset(string $name): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            unset($_SESSION[$name]);
        }
    }

    /**
     * @param string $name
     * @return bool
     */
    public function isSet(string $name): bool
    {
        if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION[$name])) {
            return true;
        }

        return false;
    }

    /**
     * @param string $name
     * @return string|int|null
     */
    public function get(string $name): string|int|null
    {
        if ($this->isSet($name)) {
            return $_SESSION[$name];
        }

        return null;
    }

}