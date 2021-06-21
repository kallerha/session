<?php

declare(strict_types=1);

namespace FluencePrototype\SessionService;

/**
 * Class SessionService
 * @package FluencePrototype\SessionService
 */
class SessionService
{

    /**
     * @param string $name
     * @param string|int $value
     */
    public function set(string $name, string|int $value): void
    {
        $_SESSION[$name] = $value;

        session_regenerate_id(delete_old_session: true);
    }

    /**
     * @param string $name
     */
    public function unset(string $name): void
    {
        unset($_SESSION[$name]);
    }

    /**
     * @param string $name
     * @return bool
     */
    public function isSet(string $name): bool
    {
        if (isset($_SESSION[$name])) {
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