<?php
class PostWrapper {
    private static $instance = null; // Статична властивість для зберігання єдиного екземпляра класу

    private function __construct() {} // Приватний конструктор, щоб заборонити створення екземплярів зовні

    public static function getInstance() {
        if (self::$instance === null) { // Якщо екземпляр ще не існує, створюємо новий
            self::$instance = new PostWrapper();
        }
        return self::$instance; // Повертаємо єдиний екземпляр класу
    }

    public function post($key) {
        return isset($_POST[$key]) ? $_POST[$key] : null;
    }

    public function __get($name) {
        if(isset($_POST[$name])) {
            return $_POST[$name];
        } else {
            return null;
        }
    }
}

// Використання сінглтону:
$postWrapper = PostWrapper::getInstance();

// Виведення інформації на екран, використовуючи магічний метод __get
echo "Username: " . $postWrapper->username;