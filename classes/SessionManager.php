<?php
class SessionManager {
    private static $instance;

    private function __construct() {
        session_start();
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function setSession($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function getSessionData($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public function destroySession() {
        session_destroy();
        self::$instance = null;
    }

    public function unsetSession($key) {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
}