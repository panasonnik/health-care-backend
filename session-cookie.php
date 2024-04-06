<?php
class SessionCookieHandler {
    public function __construct() {
        // Почати сесію
        session_start();
    }

    public function setSessionValue($key, $value) {
        // Встановити значення у сесії
        $_SESSION[$key] = $value;
    }

    public function getSessionValue($key) {
        // Отримати значення з сесії
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public function setCookieValue($key, $value, $expire, $path = '/') {
        // Встановити значення у куці
        setcookie($key, $value, $expire, $path);
    }

    public function getCookieValue($key) {
        // Отримати значення cookie
        return isset($_COOKIE[$key]) ? htmlspecialchars($_COOKIE[$key], ENT_QUOTES, 'UTF-8') : null;
    }

    public function deleteSessionValue($key) {
        // Видалити значення з сесії
        unset($_SESSION[$key]);
    }

    public function deleteCookieValue($key) {
        // Видалити значення з cookie
        setcookie($key, '', time() - 3600); // встановлюємо час закінчення куки в минуле, щоб вона видалилась
    }
}

// Створення екземпляру класу SessionCookieHandler
$handler = new SessionCookieHandler();

// Встановлення значення у сесії
$handler->setSessionValue('username', 'John Session');

// Встановлення значення у cookie
$handler->setCookieValue('username', 'John Cookie', time() + (86400 * 30), '/'); // cookie дійсне протягом 30 днів

// Отримання значення з сесії
$sessionUsername = $handler->getSessionValue('username');
echo "Session Username: " . $sessionUsername . "<br>";

// Отримання значення з cookie
$cookieUsername = $handler->getCookieValue('username');
echo "Cookie Username: " . $cookieUsername . "<br>";

// Видалення значень з сесії та cookie
$handler->deleteSessionValue('username');
$handler->deleteCookieValue('username');

