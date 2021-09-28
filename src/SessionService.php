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
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $_SESSION[$name] = $value;

        session_write_close();
    }

    /**
     * @param string $name
     */
    public function unset(string $name): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        unset($_SESSION[$name]);

        session_write_close();
    }

    /**
     * @param string $name
     * @return bool
     */
    public function isSet(string $name): bool
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $isSet = isset($_SESSION[$name]);

        session_write_close();

        return $isSet;
    }

    /**
     * @param string $name
     * @return string|int|null
     */
    public function get(string $name): string|int|null
    {
        if ($this->isSet($name)) {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }

            $value = $_SESSION[$name];

            session_write_close();

            return $value;
        }

        return null;
    }

}